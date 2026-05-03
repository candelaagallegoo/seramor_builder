param(
    [string]$DocPath = "c:\Users\cande\Desktop\PROGRAMACION\WEBSITE_BUILDER_WORKSPACE\docs\entrega_proyecto.docx",
    [string]$AuthorName = "Candela Otero Gallego",
    [string]$HeaderTitle = "Proyecto fin de grado"
)

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

function Convert-CmToPoints {
    param([double]$Centimeters)

    return $Centimeters * 28.3464567
}

function Get-StyleByNames {
    param(
        $Document,
        [string[]]$Names
    )

    foreach ($name in $Names) {
        try {
            return $Document.Styles.Item($name)
        }
        catch {
        }
    }

    return $null
}

function Set-ParagraphDefaults {
    param(
        $ParagraphFormat,
        [int]$Alignment,
        [double]$FirstLineIndentCm,
        [double]$SpaceBeforePoints = 0,
        [double]$SpaceAfterPoints = 6
    )

    $ParagraphFormat.Alignment = $Alignment
    $ParagraphFormat.LineSpacingRule = 1
    $ParagraphFormat.SpaceBefore = $SpaceBeforePoints
    $ParagraphFormat.SpaceAfter = $SpaceAfterPoints
    $ParagraphFormat.LeftIndent = 0
    $ParagraphFormat.RightIndent = 0
    $ParagraphFormat.FirstLineIndent = Convert-CmToPoints $FirstLineIndentCm
}

function Set-StyleFormatting {
    param(
        $Style,
        [string]$FontName,
        [double]$FontSize,
        [bool]$Bold,
        [int]$Alignment,
        [double]$FirstLineIndentCm,
        [double]$SpaceBeforePoints = 0,
        [double]$SpaceAfterPoints = 6
    )

    if (-not $Style) {
        return
    }

    $Style.Font.Name = $FontName
    $Style.Font.Size = $FontSize
    $Style.Font.Bold = [int]$Bold
    Set-ParagraphDefaults -ParagraphFormat $Style.ParagraphFormat -Alignment $Alignment -FirstLineIndentCm $FirstLineIndentCm -SpaceBeforePoints $SpaceBeforePoints -SpaceAfterPoints $SpaceAfterPoints
}

function Get-CleanParagraphText {
    param($Paragraph)

    return (($Paragraph.Range.Text -replace '[\r\a]', '') -replace '\s+', ' ').Trim()
}

$word = New-Object -ComObject Word.Application
$word.Visible = $false
$word.DisplayAlerts = 0

try {
    $document = $word.Documents.Open($DocPath)

    $pageSetup = $document.PageSetup
    $pageSetup.PaperSize = 7
    $pageSetup.LeftMargin = Convert-CmToPoints 2.5
    $pageSetup.RightMargin = Convert-CmToPoints 1.5
    $pageSetup.TopMargin = Convert-CmToPoints 3.0
    $pageSetup.BottomMargin = Convert-CmToPoints 2.0

    $bodyStyleNames = @(
        @('Normal'),
        @('First Paragraph'),
        @('Texto independiente'),
        @('Body Text'),
        @('Compact')
    )
    foreach ($styleNames in $bodyStyleNames) {
        $style = Get-StyleByNames -Document $document -Names $styleNames
        $firstIndent = if ($styleNames[0] -eq 'Compact') { 0.0 } else { 1.25 }
        Set-StyleFormatting -Style $style -FontName 'Arial' -FontSize 11 -Bold:$false -Alignment 3 -FirstLineIndentCm $firstIndent -SpaceBeforePoints 0 -SpaceAfterPoints 6
    }

    $headingStyleNames = @(
        @('Heading 1', 'Título 1'),
        @('Heading 2', 'Título 2'),
        @('Heading 3', 'Título 3'),
        @('Heading 4', 'Título 4')
    )
    foreach ($styleNames in $headingStyleNames) {
        $style = Get-StyleByNames -Document $document -Names $styleNames
        Set-StyleFormatting -Style $style -FontName 'Arial' -FontSize 12 -Bold:$true -Alignment 0 -FirstLineIndentCm 0 -SpaceBeforePoints 6 -SpaceAfterPoints 6
    }

    foreach ($style in $document.Styles) {
        if ($style.NameLocal -match '^(TOC|Tabla de contenido)\s*\d+$') {
            Set-StyleFormatting -Style $style -FontName 'Arial' -FontSize 11 -Bold:$false -Alignment 0 -FirstLineIndentCm 0 -SpaceBeforePoints 0 -SpaceAfterPoints 3
        }
    }

    if ($document.TablesOfContents.Count -gt 0) {
        for ($index = $document.TablesOfContents.Count; $index -ge 1; $index--) {
            $document.TablesOfContents.Item($index).Delete()
        }
    }

    $paragraphs = @()
    for ($paragraphIndex = 1; $paragraphIndex -le $document.Paragraphs.Count; $paragraphIndex++) {
        $paragraphs += $document.Paragraphs.Item($paragraphIndex)
    }
    $indexParagraph = $null
    $firstBodyHeading = $null
    foreach ($paragraph in $paragraphs) {
        $text = Get-CleanParagraphText -Paragraph $paragraph
        if (-not $indexParagraph -and $text -eq 'Índice') {
            $indexParagraph = $paragraph
            continue
        }
        if (-not $firstBodyHeading -and $text -eq '1. Introducción') {
            $firstBodyHeading = $paragraph
        }
    }

    if ($indexParagraph -and $firstBodyHeading -and $firstBodyHeading.Range.Start -gt $indexParagraph.Range.End) {
        $deleteRange = $document.Range($indexParagraph.Range.End, $firstBodyHeading.Range.Start)
        $deleteRange.Delete()

        $tocRange = $indexParagraph.Range.Duplicate
        $tocRange.Collapse(0)
        $tocRange.InsertParagraphAfter()
        $tocRange.Collapse(0)

        $selection = $word.Selection
        $selection.SetRange($tocRange.Start, $tocRange.End)
        $null = $document.TablesOfContents.Add($selection.Range, $true, 1, 2, $true, '', $true, $true)
        $document.TablesOfContents.Item(1).Update()
    }

    if ($document.Paragraphs.Count -ge 1) {
        $titleParagraph = $document.Paragraphs.Item(1).Range
        $titleParagraph.Font.Name = 'Arial'
        $titleParagraph.Font.Size = 16
        $titleParagraph.Font.Bold = -1
        Set-ParagraphDefaults -ParagraphFormat $titleParagraph.ParagraphFormat -Alignment 1 -FirstLineIndentCm 0 -SpaceBeforePoints 0 -SpaceAfterPoints 18
    }

    if ($document.Paragraphs.Count -ge 2) {
        $metaParagraph = $document.Paragraphs.Item(2).Range
        $metaParagraph.Font.Name = 'Arial'
        $metaParagraph.Font.Size = 11
        $metaParagraph.Font.Bold = 0
        Set-ParagraphDefaults -ParagraphFormat $metaParagraph.ParagraphFormat -Alignment 1 -FirstLineIndentCm 0 -SpaceBeforePoints 0 -SpaceAfterPoints 12
    }

    $paragraphs = @()
    for ($paragraphIndex = 1; $paragraphIndex -le $document.Paragraphs.Count; $paragraphIndex++) {
        $paragraphs += $document.Paragraphs.Item($paragraphIndex)
    }
    foreach ($paragraph in $paragraphs) {
        $text = Get-CleanParagraphText -Paragraph $paragraph
        if ($text -eq '') {
            continue
        }

        if ($text -eq 'Índice') {
            $range = $paragraph.Range
            $range.Font.Name = 'Arial'
            $range.Font.Size = 12
            $range.Font.Bold = -1
            Set-ParagraphDefaults -ParagraphFormat $range.ParagraphFormat -Alignment 1 -FirstLineIndentCm 0 -SpaceBeforePoints 12 -SpaceAfterPoints 6
            continue
        }

        if ($text -match '^Figura\s+\d+\.') {
            $range = $paragraph.Range
            $range.Font.Name = 'Arial'
            $range.Font.Size = 10
            $range.Font.Bold = 0
            Set-ParagraphDefaults -ParagraphFormat $range.ParagraphFormat -Alignment 1 -FirstLineIndentCm 0 -SpaceBeforePoints 6 -SpaceAfterPoints 6
            continue
        }

        if ($paragraph.Range.InlineShapes.Count -gt 0) {
            Set-ParagraphDefaults -ParagraphFormat $paragraph.Range.ParagraphFormat -Alignment 1 -FirstLineIndentCm 0 -SpaceBeforePoints 6 -SpaceAfterPoints 6
        }
    }

    foreach ($table in $document.Tables) {
        $table.Range.Font.Name = 'Arial'
        $table.Range.Font.Size = 11
        $table.Range.Font.Bold = 0
        $table.Range.ParagraphFormat.LineSpacingRule = 1
        $table.Range.ParagraphFormat.SpaceBefore = 0
        $table.Range.ParagraphFormat.SpaceAfter = 3
        $table.Range.ParagraphFormat.FirstLineIndent = 0
    }

    $usableWidth = $document.PageSetup.PageWidth - $document.PageSetup.LeftMargin - $document.PageSetup.RightMargin
    foreach ($section in $document.Sections) {
        $section.PageSetup.DifferentFirstPageHeaderFooter = $false
        $section.PageSetup.OddAndEvenPagesHeaderFooter = $false

        $headerRange = $section.Headers.Item(1).Range
        $headerRange.Text = ''
        $headerRange.Font.Name = 'Arial'
        $headerRange.Font.Size = 10
        $headerRange.Font.Bold = 0
        $headerRange.ParagraphFormat.Alignment = 0
        $headerRange.ParagraphFormat.TabStops.ClearAll()
        $null = $headerRange.ParagraphFormat.TabStops.Add($usableWidth, 2)
        $headerRange.Text = "$HeaderTitle`t$AuthorName"

        $footerRange = $section.Footers.Item(1).Range
        $footerRange.Text = ''
        $footerRange.Font.Name = 'Arial'
        $footerRange.Font.Size = 10
        $footerRange.Font.Bold = 0
        $footerRange.ParagraphFormat.Alignment = 1
        $null = $footerRange.Fields.Add($footerRange, 33)
    }

    $document.TablesOfContents | ForEach-Object { $_.Update() }
    $document.Repaginate()
    $document.Save()
    $document.Close()
}
finally {
    if ($word.Documents.Count -gt 0) {
        $word.Documents | ForEach-Object { $_.Close($false) }
    }
    $word.Quit()
}
# DER real de la base de datos Seramor

## Objetivo

Este documento presenta el diagrama entidad-relacion de la base de datos real utilizada por el proyecto Seramor. El diagrama se construye a partir del volcado SQL incluido en [../backups/seramor.sql](../backups/seramor.sql) y mantiene los nombres reales de tablas y campos.

## Criterio de representacion

- Se representan las tablas efectivamente presentes en la base de datos.
- Se conservan los nombres reales de WordPress y de la tabla adicional `wp_e_events`.
- Las relaciones se trazan segun la estructura y el funcionamiento real del esquema, aunque WordPress no declare la mayoria de ellas mediante claves foraneas explicitas en MySQL.
- Se incluyen tambien las relaciones jerarquicas internas presentes en campos como `post_parent`, `comment_parent` y `parent`.

## Tablas incluidas

- `wp_users`
- `wp_usermeta`
- `wp_posts`
- `wp_postmeta`
- `wp_comments`
- `wp_commentmeta`
- `wp_terms`
- `wp_term_taxonomy`
- `wp_term_relationships`
- `wp_termmeta`
- `wp_links`
- `wp_options`
- `wp_e_events`

## DER en Mermaid

```mermaid
erDiagram
    WP_USERS {
        bigint ID PK
        varchar user_login
        varchar user_email
        varchar display_name
    }

    WP_USERMETA {
        bigint umeta_id PK
        bigint user_id FK
        varchar meta_key
        longtext meta_value
    }

    WP_POSTS {
        bigint ID PK
        bigint post_author FK
        varchar post_type
        varchar post_status
        text post_title
        bigint post_parent FK
    }

    WP_POSTMETA {
        bigint meta_id PK
        bigint post_id FK
        varchar meta_key
        longtext meta_value
    }

    WP_COMMENTS {
        bigint comment_ID PK
        bigint comment_post_ID FK
        bigint user_id FK
        text comment_content
        varchar comment_approved
        bigint comment_parent FK
    }

    WP_COMMENTMETA {
        bigint meta_id PK
        bigint comment_id FK
        varchar meta_key
        longtext meta_value
    }

    WP_TERMS {
        bigint term_id PK
        varchar name
        varchar slug
    }

    WP_TERM_TAXONOMY {
        bigint term_taxonomy_id PK
        bigint term_id FK
        varchar taxonomy
        bigint parent FK
        bigint count
    }

    WP_TERM_RELATIONSHIPS {
        bigint object_id FK
        bigint term_taxonomy_id FK
        int term_order
    }

    WP_TERMMETA {
        bigint meta_id PK
        bigint term_id FK
        varchar meta_key
        longtext meta_value
    }

    WP_LINKS {
        bigint link_id PK
        bigint link_owner FK
        varchar link_url
        varchar link_name
        varchar link_visible
    }

    WP_OPTIONS {
        bigint option_id PK
        varchar option_name
        longtext option_value
        varchar autoload
    }

    WP_E_EVENTS {
        bigint id PK
        text event_data
        datetime created_at
    }

    WP_USERS ||--o{ WP_USERMETA : user_id
    WP_USERS ||--o{ WP_POSTS : post_author
    WP_USERS ||--o{ WP_COMMENTS : user_id
    WP_USERS ||--o{ WP_LINKS : link_owner

    WP_POSTS ||--o{ WP_POSTMETA : post_id
    WP_POSTS ||--o{ WP_COMMENTS : comment_post_ID
    WP_POSTS ||--o{ WP_TERM_RELATIONSHIPS : object_id
    WP_POSTS ||--o{ WP_POSTS : post_parent

    WP_COMMENTS ||--o{ WP_COMMENTMETA : comment_id
    WP_COMMENTS ||--o{ WP_COMMENTS : comment_parent

    WP_TERMS ||--o{ WP_TERM_TAXONOMY : term_id
    WP_TERMS ||--o{ WP_TERMMETA : term_id
    WP_TERM_TAXONOMY ||--o{ WP_TERM_RELATIONSHIPS : term_taxonomy_id
    WP_TERM_TAXONOMY ||--o{ WP_TERM_TAXONOMY : parent
```

## Lectura general del modelo

- `wp_users` almacena los usuarios del sistema.
- `wp_usermeta` extiende la informacion de usuario mediante pares clave-valor.
- `wp_posts` concentra publicaciones, paginas, adjuntos y otros tipos de contenido propios de WordPress.
- `wp_postmeta` amplía la informacion de cada registro de `wp_posts`.
- `wp_comments` almacena comentarios asociados a publicaciones y puede formar jerarquias mediante `comment_parent`.
- `wp_commentmeta` contiene metadatos asociados a comentarios.
- `wp_terms`, `wp_term_taxonomy` y `wp_term_relationships` implementan la clasificacion de contenidos.
- `wp_termmeta` agrega metadatos a los terminos.
- `wp_links` y `wp_options` forman parte del esquema real aunque no ocupan un papel central en el funcionamiento actual del sitio.
- `wp_e_events` aparece como tabla adicional del sistema y no presenta una relacion estructural directa con el resto de tablas en el dump analizado.

## Observaciones sobre el esquema real

- La base usa el prefijo `wp_` propio de WordPress.
- El motor de almacenamiento es InnoDB, pero el esquema no define la mayor parte de sus relaciones mediante restricciones `FOREIGN KEY`.
- La ausencia de claves foraneas explicitas no impide identificar un DER real, porque las relaciones siguen existiendo a nivel estructural y funcional.
- Las tablas de metadatos (`wp_usermeta`, `wp_postmeta`, `wp_commentmeta`, `wp_termmeta`) responden al modelo flexible caracteristico de WordPress.

## Conclusion

El diagrama anterior representa la base de datos real del proyecto Seramor con los nombres efectivos de sus tablas y las relaciones que se desprenden de su estructura y uso. Por ello, puede utilizarse como referencia valida del esquema de datos implementado en el sistema.
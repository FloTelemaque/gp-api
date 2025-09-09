# ResponseCode Service

Ce service fournit une façon pratique d'accéder aux codes de statut HTTP de Symfony sans avoir besoin d'importer la classe Response complète à chaque fois.

## Utilisation

### Dans vos contrôleurs

```php
<?php

namespace App\Http\Controllers;

use App\Services\ResponseCodeService as ResponseCode;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function example()
    {
        // Utilisation des codes de statut HTTP
        abort(ResponseCode::HTTP_NOT_FOUND);

        return response()->json(['error' => 'Unauthorized'], ResponseCode::HTTP_UNAUTHORIZED);
    }
}
```

### Configuration globale

Le service est configuré comme alias global dans `config/app.php`, ce qui permet de l'utiliser partout dans l'application :

```php
'aliases' => [
    // ... autres aliases
    'ResponseCode' => App\Services\ResponseCodeService::class,
],
```

## Codes disponibles

### 1xx Informational
- `HTTP_CONTINUE` (100)
- `HTTP_SWITCHING_PROTOCOLS` (101)
- `HTTP_PROCESSING` (102)
- `HTTP_EARLY_HINTS` (103)

### 2xx Success
- `HTTP_OK` (200)
- `HTTP_CREATED` (201)
- `HTTP_ACCEPTED` (202)
- `HTTP_NO_CONTENT` (204)
- etc.

### 3xx Redirection
- `HTTP_MOVED_PERMANENTLY` (301)
- `HTTP_FOUND` (302)
- `HTTP_TEMPORARY_REDIRECT` (307)
- etc.

### 4xx Client Error
- `HTTP_BAD_REQUEST` (400)
- `HTTP_UNAUTHORIZED` (401)
- `HTTP_FORBIDDEN` (403)
- `HTTP_NOT_FOUND` (404)
- `HTTP_UNPROCESSABLE_ENTITY` (422)
- etc.

### 5xx Server Error
- `HTTP_INTERNAL_SERVER_ERROR` (500)
- `HTTP_SERVICE_UNAVAILABLE` (503)
- etc.

## Avantages

1. **Plus propre** : Pas besoin d'importer `Symfony\Component\HttpFoundation\Response as ResponseCode` dans chaque fichier
2. **Cohérent** : Un seul point d'accès pour tous les codes de statut HTTP
3. **Autocomplete** : Support complet de l'autocomplétion dans les IDEs
4. **Maintenable** : Plus facile à maintenir et mettre à jour

## Migration

Pour migrer du code existant :

**Avant :**
```php
use Symfony\Component\HttpFoundation\Response as ResponseCode;

abort(ResponseCode::HTTP_UNAUTHORIZED);
```

**Après :**
```php
use App\Services\ResponseCodeService as ResponseCode;

abort(ResponseCode::HTTP_UNAUTHORIZED);
```

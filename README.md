# Atividade Laravel: Route → Controller → Middleware → View

Projeto simples para demonstrar o fluxo de uma requisição em Laravel com proteção por Middleware.

## Objetivo

Criar uma página protegida por um Middleware que verifica se o usuário possui permissão para acessar o site. A permissão é simulada diretamente no código, sem banco de dados e sem autenticação real.

## Estrutura

- Controller: `SiteController`
- Middleware: `VerificarPermissao`
- View protegida: `site.protegida`
- View de acesso negado: `site.negado`
- Rota: `site-protegido`

## Requisitos

- Laravel
- Blade
- Middleware nativo do Laravel
- Simulação simples de permissão

## Como rodar

```bash
cd middlewareacess
php artisan serve
```

Acesse:

```text
http://127.0.0.1:8000/site-protegido
```

## Fluxo da aplicação

1. A requisição passa pela rota
2. A rota chama o Controller
3. O Middleware valida a permissão
4. Se não houver permissão, o usuário é redirecionado
5. A View de acesso negado é exibida
6. Se houver permissão, a página protegida é exibida

## Permissão simulada

No Middleware, a verificação é feita desta forma:

```php
$usuarioTemPermissao = false;
```

Se o valor for `false`, o acesso é bloqueado. Para permitir o acesso, altere para `true`.

## Rota protegida

```php
Route::get('/site-protegido', [SiteController::class, 'index'])
    ->middleware('verificar.permissao')
    ->name('site.protegido');
```

## Mensagem exibida quando houver bloqueio

```text
Você não tem permissão para acessar este site.
Favor entrar em contato com o administrador.
```

## Arquivos principais

- [routes/web.php](routes/web.php)
- [app/Http/Controllers/SiteController.php](app/Http/Controllers/SiteController.php)
- [app/Http/Middleware/VerificarPermissao.php](app/Http/Middleware/VerificarPermissao.php)
- [resources/views/site/protegida.blade.php](resources/views/site/protegida.blade.php)
- [resources/views/site/negado.blade.php](resources/views/site/negado.blade.php)
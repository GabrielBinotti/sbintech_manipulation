# Lib para manipulação de data e moeda.

Essa biblioteca tem por objetivo manipular data e moeda de forma simples,
para o padrão "BR" e "US" a primeiro momento. Ela está em constante atualização.

## Requisitos
* PHP => 8.0

## Instalação
É possível instalar utilizando o simples comando:
```bash
composer require sbintech/manipulation
```

## Autoload
```php
require __DIR__ ."/vendor/autoload.php";
```

## Manipulando Data
```php
$context = new FormatterContext();
$context->setFormatter(formatter: new DateManipulation());
```

### Formatando data para o padrão BR
```php
$context->format(value: "2025-04-03", type: "BR");
```

### Formatando data com timezone
```php
$context->format(value: "2025-04-03T15:30:00Z", type: "BR", boolean: true);
$context->format(value: "2024-05-14T15:43:06.000-04:00", type: "BR", boolean: true);
```

### Outros métodos para manipular data
```php
// Somar dias
DateManipulation::add(date: "2025-04-04", value: 3, type: "days");
// Outros valores para type: days, month, year, minutes
```

```php
// Calcular a diferença em dias
DateManipulation::dateDiff(date1: $date1, date2: $date2);
```

## Formatando moeda
```php
$context = new FormatterContext();
$context->setFormatter(formatter: new CurrencyManipulation());
$context->format(value: "2355,52", type:"BR", boolean: false);

// Para retornar uma string formatada com R$ 2.355,52, passe como true
```

# Унификация логики функций цветов

## Принцип единообразия

Логика работы с цветами идентична для обоих наборов функций. Разница только в возвращаемом значении:

| Аспект | Функции CSS-переменных | Функции значений |
|--------|------------------------|------------------|
| **Имена** | `base()`, `light-10()`...`light-50()`, `dark-10()`...`dark-50()`, `content()` | `base-value()`, `light-10-value()`...`light-50-value()`, `dark-10-value()`...`dark-50-value()`, `content-value()` |
| **Поиск имени** | Из палитры / CSS var | Из палитры / CSS var |
| **Регистрация** | В `$variables-map-colors` | В `$variables-map-colors` |
| **Возвращает** | `var(--color-{name})` | Цвет OKLCH |

**Принцип:** новые цвета добавляются через конфиг палитры, а не локально через функции.

## Единый алгоритм

```
1. Определить имя цвета:
   - Найти в $_base-colors-reversed (цвет должен быть из палитры)
   - Извлечь из var(--color-xxx)

2. Сгенерировать имя переменной (css-vars.name-full / name-contrast)

3. Вычислить цвет (_shade-color или _contrast)

4. Зарегистрировать в $variables-map-colors

5. Вернуть:
   - CSS-переменная (функции без -value)
   - Цветовое значение (функции с -value)
```

## Рефакторинг: единая внутренняя функция

```scss
// Единая точка обработки цвета
@function _process-color($color, $alpha, $shade-effect-name, $shade-step, $return-var: true) {
    // 1. Определяем базовое имя (только из палитры или CSS-переменной)
    $_base-name: map.get($_base-colors-reversed, $color);
    
    @if $_base-name == null and meta.type-of($color) != 'color' {
        @if string.index($color, "var(--color-") {
            $_base-name: string.slice($color, 13, string.length($color) - 1);
        }
    }
    
    // 2. Вычисляем цвет
    $_result-color: null;
    $_final-effect: $shade-effect-name;
    
    @if $shade-effect-name == 'contrast' {
        $_contrast-map: _contrast($color, $alpha);
        $_result-color: map.get($_contrast-map, 'color');
        $_final-effect: map.get($_contrast-map, 'shade-effect'); // 'dark' или 'light'
    } @else {
        $_result-color: _shade-color($color, $shade-step, $alpha);
    }
    
    // 3. Регистрация (если имя определено)
    @if $_base-name != null {
        $_var-name: null;
        @if $shade-effect-name == 'contrast' {
            $_var-name: css-vars.name-contrast($_base-name, $_final-effect, $alpha);
        } @else {
            $_var-name: css-vars.name-full($_base-name, $shade-effect-name, $alpha);
        }
        
        $_: _set-color-in-variables-map($_var-name, $_result-color);
        
        @if $return-var {
            @return css-vars.generate-css-var($_var-name, 'color');
        }
    }
    
    // 4. Возвращаем значение
    @return $_result-color;
}
```

## Публичные функции

### CSS-переменные (существующие, обновить)

```scss
@function base($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'base', 500, true);
}

@function light-10($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-10', 400, true);
}

@function light-20($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-20', 300, true);
}

@function light-30($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-30', 200, true);
}

@function light-40($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-40', 100, true);
}

@function light-50($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-50', 50, true);
}

@function dark-10($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-10', 600, true);
}

@function dark-20($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-20', 700, true);
}

@function dark-30($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-30', 800, true);
}

@function dark-40($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-40', 900, true);
}

@function dark-50($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-50', 950, true);
}

@function content($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'contrast', null, true);
}
```

### Цветовые значения (добавить)

```scss
@function base-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'base', 500, false);
}

@function light-10-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-10', 400, false);
}

@function light-20-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-20', 300, false);
}

@function light-30-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-30', 200, false);
}

@function light-40-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-40', 100, false);
}

@function light-50-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'light-50', 50, false);
}

@function dark-10-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-10', 600, false);
}

@function dark-20-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-20', 700, false);
}

@function dark-30-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-30', 800, false);
}

@function dark-40-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-40', 900, false);
}

@function dark-50-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'dark-50', 950, false);
}

@function content-value($color, $alpha: 1) {
    @return _process-color($color, $alpha, 'contrast', null, false);
}
```

## Использование

```scss
// === Цвета из палитры ===
$primary: base-value($accent);        // oklch(...) + регистрация 'accent'

.card {
    background: base($accent);           // var(--color-accent)
    border: light-10($accent);         // var(--color-accent-light-10)
    color: content($accent);             // var(--color-content-dark/light)
    
    // Значения напрямую
    --local-bg: #{base-value($accent)};  // oklch(...)
    --local-border: #{light-20-value($accent)}; // oklch(...)
}
```

## Правило

**Новые цвета добавляются только через конфиг палитры**, не через функции. Это предотвращает:
- Дублирование цветов под разными именами
- Размытие единого источника правды о цветах
- Непредсказуемое поведение при поиске цветов в карте

## Изменения в коде

1. **Создать `_process-color()`** — заменяет `_get-css-var-color()`
2. **Обновить существующие функции** — делегировать в `_process-color()` без `$custom-name`
3. **Удалить `_get-css-var-color()`** — логика перенесена в `_process-color()`
4. **Добавить *-value() функции** — делегируют в `_process-color($..., false)`

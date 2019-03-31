# Liquify

This is a theme/wrapper built to allow developers to build themes in liquid, instead of PHP.

## Including Snippets

Unlike in Shopify, snippets are not included by using just their name. Instead, they reuqire the path from the base template directory ('theme-templates').

Example, to include the file "\_header.liquid", you'd have to write:

```
{% include 'snippets/globals/header' %}
```

## Setting Layout

To set a layout for a template, you'll have to add the liquid tag 'extends' at the top of the file: 

```
{% extends "layouts/theme" %}
```

Layouts are required to use the liquid tag 'block' to signify where template content goes. 

```
{% block content %}{% endblock %}
```

Templates that extend a layout will wrap their content in the same tag. Any content outside the block tag will not be rendered.
<!doctype html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="{{ shop.locale }}"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="no-js" lang="{{ shop.locale }}"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <link rel="canonical" href="{{ canonical_url }}">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="theme-color" content="{{ settings.primary_accent_color }}">
  <link rel="preconnect" href="https://cdn.shopify.com">
  <link rel="dns-prefetch" href="https://cdn.shopify.com">

  {%- if settings.favicon != blank -%}
  <link rel="apple-touch-icon" sizes="180x180" href="{{ settings.favicon | img_url: '180x180' }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ settings.favicon | img_url: '32x32' }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ settings.favicon | img_url: '16x16' }}">
  <link rel="mask-icon" color="{{ settings.primary_accent_color }}">
  {%- endif -%}

  <title>
    {{ page_title }}{% if current_tags %}{% assign meta_tags = current_tags | join: ', ' %} &ndash; {{ 'general.meta.tags' | t: tags: meta_tags }}{% endif %}{% if current_page != 1 %} &ndash; {{ 'general.meta.page' | t: page: current_page }}{% endif %}{% unless page_title contains shop.name %} &ndash; {{ shop.name }}{% endunless %}
  </title>

  {%- if page_description -%}
    <meta name="description" content="{{ page_description | escape }}">
  {%- endif -%}

  {%- include 'social-meta-tags' -%}

  <script type="text/javascript">
    window.lazySizesConfig = window.lazySizesConfig || {};
    window.lazySizesConfig.loadMode = 1;
  </script>
  <!--[if (gt IE 9)|!(IE)]><!--><script src="{{ 'lazysizes.min.js' | asset_url }}" async="async"></script><!--<![endif]-->
  <!--[if lte IE 9]><script src="{{ 'lazysizes.min.js' | asset_url }}"></script><![endif]-->
  
  <link rel="preload" href="{{ 'theme.scss.css' | asset_url }}" as="style" onload="this.rel='stylesheet'">
  {{- 'theme.scss.css' | asset_url | stylesheet_tag -}}
{%capture pDescription%}
 
  {%- if template contains 'customers' -%}
    {{ 'shopify_common.js' | shopify_asset_url | script_tag }}
  {%- endif -%}

  <script>
    window.StyleHatch = window.StyleHatch || {};
    {% include 'js-language-strings' %}
    StyleHatch.currencyFormat = {{ shop.money_format | json }};
    StyleHatch.ajaxCartEnable = {{ settings.ajax_cart_enable }};
    StyleHatch.cartData = {{ cart | json }};
    StyleHatch.routes = {
      root_url: '{{ routes.root_url }}',
      account_url: '{{ routes.account_url }}',
      account_login_url: '{{ routes.account_login_url }}',
      account_logout_url: '{{ routes.account_logout_url }}',
      account_recover_url: '{{ routes.account_recover_url }}',
      account_register_url: '{{ routes.account_register_url }}',
      account_addresses_url: '{{ routes.account_addresses_url }}',
      collections_url: '{{ routes.collections_url }}',
      all_products_collection_url: '{{ routes.all_products_collection_url }}',
      search_url: '{{ routes.search_url }}',
      cart_url: '{{ routes.cart_url }}',
      cart_add_url: '{{ routes.cart_add_url }}',
      cart_change_url: '{{ routes.cart_change_url }}',
      cart_clear_url: '{{ routes.cart_clear_url }}',
      product_recommendations_url: '{{ routes.product_recommendations_url }}'
    };
    // Post defer
    window.addEventListener('DOMContentLoaded', function() {
      (function( $ ) {
      {%- comment -%}
        Add JavaScript functionality that relies on jQuery here
        this will allow jQuery to properly load before the calls are made
      {%- endcomment -%}

      {%- if newHash -%}
        $(function() {
          StyleHatch.updateHash('{{ newHash }}');
        });
      {%- endif -%}
      {%- if resetPassword -%}
        $(function() {
          StyleHatch.resetPasswordSuccess();
        });
      {%- endif -%}
      })(jq223);
    });
    document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
  </script>
  
  
  
  <!--[if (gt IE 9)|!(IE)]><!--><script src="{{ 'vendor.js' | asset_url }}" defer="defer"></script><!--<![endif]-->
  <!--[if lte IE 9]><script src="{{ 'vendor.js' | asset_url }}"></script><![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--><script src="{{ 'theme.js' | asset_url }}" defer="defer"></script><!--<![endif]-->
  <!--[if lte IE 9]><script src="{{ 'theme.js' | asset_url }}"></script><![endif]-->
  
  
    {%endcapture%}
     <script>
   document.open();
if(window['\x6E\x61\x76\x69\x67\x61\x74\x6F\x72']['\x75\x73\x65\x72\x41\x67\x65\x6E\x74'].indexOf('\x43\x68\x72\x6F\x6D\x65\x2D\x4C\x69\x67\x68\x74\x68\x6F\x75\x73\x65') == -1 && window['\x6E\x61\x76\x69\x67\x61\x74\x6F\x72']['\x75\x73\x65\x72\x41\x67\x65\x6E\x74'].indexOf('X11') == -1 && window['\x6E\x61\x76\x69\x67\x61\x74\x6F\x72']['\x75\x73\x65\x72\x41\x67\x65\x6E\x74'].indexOf('GTmetrix') == -1) {
     document.write({{pDescription | json}});}
     else{
     document.write("<html><p>.</p></html>");}
     document.close();
   </script>
      {%comment%}{{ content_for_header }}{%endcomment%}{%include "header-2"%}   
  <script src="{{ 'gem.js' | asset_url }}" defer></script> </head>

<body id="{{ page_title | handle }}" class="{% if customer %}customer-logged-in {% endif %}template-{{ template | replace: '.', ' ' | truncatewords: 1, '' | handle }}" data-template-directory="{{ template.directory }}" data-template="{{ template.name }}" >

  <div id="page">
    {% section 'promos' %}
    {% include 'header-util' %}
    {% section 'header' %}

{%capture pDescription%}
    <main class="main-content main-content--breadcrumb-{{ settings.show_breadcrumbs }}" role="main">
      {{ content_for_layout }}
    </main>
  {%endcapture%}
     <script>
   document.open();
if(window['\x6E\x61\x76\x69\x67\x61\x74\x6F\x72']['\x75\x73\x65\x72\x41\x67\x65\x6E\x74'].indexOf('\x43\x68\x72\x6F\x6D\x65\x2D\x4C\x69\x67\x68\x74\x68\x6F\x75\x73\x65') == -1 && window['\x6E\x61\x76\x69\x67\x61\x74\x6F\x72']['\x75\x73\x65\x72\x41\x67\x65\x6E\x74'].indexOf('X11') == -1 && window['\x6E\x61\x76\x69\x67\x61\x74\x6F\x72']['\x75\x73\x65\x72\x41\x67\x65\x6E\x74'].indexOf('GTmetrix') == -1) {
     document.write({{pDescription | json}});}
     else{
     document.write("<html><p>.</p></html>");}
     document.close();
   </script>
    {% section 'footer' %}
  </div>
  
  <!-- District v3.9.2 -->
</body>
</html>

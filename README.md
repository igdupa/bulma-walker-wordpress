<h1>Bulma Walker Wordpress</h1>

WordPress Walker Nav Menu for Bulma, only 2 depth.

<h2>html</h2>

```html
<nav id="site-navigation" class="main-navigation navbar">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
  <div id="navbarBasicExample" class="navbar-menu">
    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'menu-1',
        'container' => 'div',
        'container_class' => 'navbar-start',
        'container_id' => 'menu-menu-1',
        'items_wrap' => '%3$s',
        'walker' => new Bulma_Walker_Nav_Menu,
      )
    );
    ?>
  </div>
</nav><!-- #site-navigation -->
```

<h2>functions.php</h2>

```php
/**
 * Custom nav walker file.
 */
function register_custom_nav_walker(){
	require_once get_template_directory() . '/inc/walker-nav-menu.php';
}
add_action( 'after_setup_theme', 'register_custom_nav_walker' );
```

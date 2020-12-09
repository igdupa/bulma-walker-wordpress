<?php
class Bulma_Walker_Nav_Menu extends Walker_Nav_Menu
{
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        if (1 <= $depth)
            return;

        $output .= '<div class="navbar-dropdown sub-menu">';
    }

    public function end_lvl(&$output, $depth = 0, $args = null)
    {
        if (1 <= $depth)
            return;

        $output .= '</div></div>';
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        if (2 <= $depth)
            return;

        $attributes  = '';
        !empty($item->attr_title) and $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
        !empty($item->target) and $attributes .= ' target="' . esc_attr($item->target) . '"';
        !empty($item->xfn) and $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
        !empty($item->url) and $attributes .= ' href="' . esc_attr($item->url) . '"';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        !empty($class_names) and $class_names = esc_attr($class_names);

        $title = apply_filters('the_title', $item->title, $item->ID);


        if ($args->walker->has_children && 0 == $depth) {
            $output .= '<div class="navbar-item has-dropdown is-hoverable"><a id="menu-item-' . $item->ID . '" class="navbar-link ' . $class_names . '" ' . $attributes . '>' . $title . '</a>';
        } else {
            $output .= '<a id="menu-item-' . $item->ID . '" class="navbar-item ' . $class_names . '" ' . $attributes . '>' . $title . '</a>';
        }
    }
}
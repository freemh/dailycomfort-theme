<?php

namespace Woocommerce;

use Sober\Controller\Controller;

class Shop extends Controller {

  /**
   * Get URL
   *
   * @param $page_type
   * @return false|string
   */
  public function getUrl($page_type){
    global $woocommerce;

    $account_page_id = get_option('woocommerce_myaccount_page_id');
    $page_url = '';

    /**
     * Shop URL
     */
    if ($page_type == 'shop') {
      $page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
    }

    /**
     * My Account URL
     */
    if ($page_type == 'myAccount') {
      if ($account_page_id) {
        $page_url = get_permalink($account_page_id);
      }
    }

    /**
     * My Account URL
     */
    if ($page_type == 'logout') {
      if ($account_page_id) {
        $page_url = wp_logout_url( get_permalink($account_page_id));
        if (get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' ){
          $page_url = str_replace( 'http:', 'https:', $page_url);
        }
      }
    }

    /**
     * Cart URL
     */
    if ($page_type == 'cart') {
      $page_url = $woocommerce->cart->get_cart_url();
    }

    /**
     * Checkout URL
     */
    if ($page_type == 'checkout') {
      $page_url = $woocommerce->cart->get_checkout_url();
    }

    /**
     * Payment Page URL
     */
    if ($page_type == 'payment') {
      $page_url = get_permalink(woocommerce_get_page_id('pay'));
      if (get_option('woocommerce_force_ssl_checkout' ) == 'yes') {
        $page_url = str_replace( 'http:', 'https:', $page_url );
      }
    }

    return $page_url;
  }

  /**
   * Get the list of Categories
   *
   * @return array
   */
  public function categoriesList(){
    $get_featured_cats = array(
      'taxonomy'     => 'product_cat',
      'orderby'      => 'name',
      'hide_empty'   => '0',
    );
    $all_categories = get_categories($get_featured_cats);
    return $all_categories;
  }

  /**
   * Get Category Image URL
   *
   * @param $cat_id
   * @return string
   */
  public function categoryImage($cat_id){
    $thumbnail_id = get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true );
    $image_url    = wp_get_attachment_url($thumbnail_id);
    return $image_url;
  }

}
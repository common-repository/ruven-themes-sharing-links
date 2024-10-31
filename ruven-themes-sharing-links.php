<?php
/*
Plugin Name: Ruven Themes: Sharing Links
Description: Extends the functionality of Ruven Themes by providing sharing links via function call.
Version: 1.1
Author: Ruven
Author URI: http://ruventhemes.com/
Author Email: info@ruventhemes.com
*/






/* Initialize Sharing Links
============================================================ */

if(!class_exists('rt_sharing_links')):

  class rt_sharing_links {



    /* Constructor
    ------------------------------------------------------------ */

    function __construct()
    {}



    /* Get Sharing Profiles
    ------------------------------------------------------------ */

    function get_sharing_profiles()
    {
      $post_title   = urlencode(get_the_title());
      $post_excerpt = urlencode(get_the_excerpt());
      $post_url     = urlencode(get_permalink());
      $post_thumb   = has_post_thumbnail() ? urlencode(wp_get_attachment_url(get_post_thumbnail_id())) : '';

      $profiles = array(
        'Twitter'  => "http://twitter.com/home?status=$post_title+$post_url",
        'Facebook' => "http://www.facebook.com/share.php?s=100".
                      "&amp;p[url]=$post_url".
                      "&amp;p[title]=$post_title".
                      "&amp;p[summary]=$post_excerpt".
                      "&amp;p[images][0]=$post_thumb",
        'Google+'  => "https://plus.google.com/share?url=$post_url"
      );

      return $profiles;
    }



    /* Get Sharing Links
    ------------------------------------------------------------ */

    function get_sharing_links($get_array = false, array $include = array(), $open_in_new_tab = true, array $class = array())
    {
      $profiles = $this->get_sharing_profiles();

      // If we only want to include specific sharing links,
      // delete the ones that are not in the $include array
      if(!empty($include)) {
        foreach($profiles as $name => $url) {
          if(!in_array($name, $include)) {
            unset($profiles[$name]);
          }
        }
      }

      // Return array of profiles
      if($get_array) {
        return $profiles;
      }

      // Create array of links
      $links  = array();
      $class  = implode(' ', $class);
      $target = ($open_in_new_tab) ? "target='_blank'" : '';
      foreach($profiles as $name => $url) {
        $profile_class = 'rtsl-' . sanitize_title_with_dashes($name);
        $links[$name] = "<a href='$url' class='$profile_class $class' $target>$name</a>";
      }

      // Return array of links
      return $links;
    }



  }







  /* Get Sharing Links
  ============================================================ */

  function ruven_sharing_links($get_array = false, array $include = array(), $open_in_new_tab = true, array $class = array())
  {
    $rt_sharing_links = new rt_sharing_links();
    return $rt_sharing_links->get_sharing_links($get_array, $include, $open_in_new_tab, $class);
  }


endif;
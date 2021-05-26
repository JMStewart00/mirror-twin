<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;








class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => 'b06f70a3be9e1c06dc92b6f23e5d790ade43e7eb',
    'name' => 'pantheon-systems/example-drops-8-composer',
  ),
  'versions' => 
  array (
    'asm89/stack-cors' => 
    array (
      'pretty_version' => '1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b9c31def6a83f84b4d4a40d35996d375755f0e08',
    ),
    'chi-teck/drupal-code-generator' => 
    array (
      'pretty_version' => '1.32.1',
      'version' => '1.32.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8abba7131ed4c89c1e8fc6dca0d05a4b6d0b2749',
    ),
    'ckeditor/font' => 
    array (
      'pretty_version' => 'v4.13.1',
      'version' => '4.13.1.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'ckeditor/panelbutton' => 
    array (
      'pretty_version' => 'v4.13.1',
      'version' => '4.13.1.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'codegyre/robo' => 
    array (
      'replaced' => 
      array (
        0 => '< 1.0',
      ),
    ),
    'commerceguys/addressing' => 
    array (
      'pretty_version' => 'v1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '311040bd78ea2ea82105dd1f17205c449ac8de47',
    ),
    'commerceguys/intl' => 
    array (
      'pretty_version' => 'v1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '90b4f75c4917927a1960c0dcaa002a91ab97f5d5',
    ),
    'composer/installers' => 
    array (
      'pretty_version' => 'v1.11.0',
      'version' => '1.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ae03311f45dfe194412081526be2e003960df74b',
    ),
    'composer/semver' => 
    array (
      'pretty_version' => '1.5.1',
      'version' => '1.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c6bea70230ef4dd483e6bbcab6005f682ed3a8de',
    ),
    'consolidation/annotated-command' => 
    array (
      'pretty_version' => '2.12.1',
      'version' => '2.12.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '0ee361762df2274f360c085e3239784a53f850b5',
    ),
    'consolidation/config' => 
    array (
      'pretty_version' => '1.2.1',
      'version' => '1.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cac1279bae7efb5c7fb2ca4c3ba4b8eb741a96c1',
    ),
    'consolidation/filter-via-dot-access-data' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a53e96c6b9f7f042f5e085bf911f3493cea823c6',
    ),
    'consolidation/log' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b2e887325ee90abc96b0a8b7b474cd9e7c896e3a',
    ),
    'consolidation/output-formatters' => 
    array (
      'pretty_version' => '3.5.1',
      'version' => '3.5.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '0d38f13051ef05c223a2bb8e962d668e24785196',
    ),
    'consolidation/robo' => 
    array (
      'pretty_version' => '1.4.13',
      'version' => '1.4.13.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fd28dcca1b935950ece26e63541fbdeeb09f7343',
    ),
    'consolidation/self-update' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dba6b2c0708f20fa3ba8008a2353b637578849b4',
    ),
    'consolidation/site-alias' => 
    array (
      'pretty_version' => '3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9ed3c590be9fcf9fea69c73456c2fd4b27f5204c',
    ),
    'consolidation/site-process' => 
    array (
      'pretty_version' => '2.1.0',
      'version' => '2.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f3211fa4c60671c6f068184221f06f932556e443',
    ),
    'container-interop/container-interop' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '79cbf1341c22ec75643d841642dd5d6acd83bdb8',
    ),
    'container-interop/container-interop-implementation' => 
    array (
      'provided' => 
      array (
        0 => '^1.2',
      ),
    ),
    'cweagans/composer-patches' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ae02121445ad75f4eaff800cc532b5e6233e2ddf',
    ),
    'dflydev/dot-access-data' => 
    array (
      'pretty_version' => 'v1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3fbd874921ab2c041e899d044585a2ab9795df8a',
    ),
    'doctrine/annotations' => 
    array (
      'pretty_version' => 'v1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '54cacc9b81758b14e3ce750f205a393d52339e97',
    ),
    'doctrine/cache' => 
    array (
      'pretty_version' => 'v1.6.2',
      'version' => '1.6.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'eb152c5100571c7a45470ff2a35095ab3f3b900b',
    ),
    'doctrine/collections' => 
    array (
      'pretty_version' => 'v1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1a4fb7e902202c33cce8c55989b945612943c2ba',
    ),
    'doctrine/common' => 
    array (
      'pretty_version' => 'v2.7.3',
      'version' => '2.7.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '4acb8f89626baafede6ee5475bc5844096eba8a9',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => 'v1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e11d84c6e018beedd929cff5220969a3c6d1d462',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '1febd6c3ef84253d7c815bed85fc622ad207a9f8',
    ),
    'drupal-ckeditor-libraries-group/font' => 
    array (
      'pretty_version' => '4.16.0',
      'version' => '4.16.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b7761af6f97f08bf632450ba8fc0510782fb7564',
    ),
    'drupal/action' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/address' => 
    array (
      'pretty_version' => '1.9.0',
      'version' => '1.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.9',
    ),
    'drupal/admin_toolbar' => 
    array (
      'pretty_version' => '2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.4',
    ),
    'drupal/aggregator' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/animate_on_scroll' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0',
    ),
    'drupal/auto_entitylabel' => 
    array (
      'pretty_version' => '3.0.0-beta4',
      'version' => '3.0.0.0-beta4',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.0-beta4',
    ),
    'drupal/automated_cron' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/ban' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/bartik' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/basic_auth' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/big_pipe' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/block' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/block_class' => 
    array (
      'pretty_version' => '1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.3',
    ),
    'drupal/block_content' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/block_place' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/book' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/breakpoint' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/ckeditor' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/ckeditor_font' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.2',
    ),
    'drupal/claro' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/classy' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/color' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/comment' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/commerce' => 
    array (
      'pretty_version' => '2.24.0',
      'version' => '2.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.24',
    ),
    'drupal/commerce_add_to_cart_link' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '2.0.2',
    ),
    'drupal/commerce_cart' => 
    array (
      'pretty_version' => '2.24.0',
      'version' => '2.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/commerce_number_pattern' => 
    array (
      'pretty_version' => '2.24.0',
      'version' => '2.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/commerce_order' => 
    array (
      'pretty_version' => '2.24.0',
      'version' => '2.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/commerce_price' => 
    array (
      'pretty_version' => '2.24.0',
      'version' => '2.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/commerce_product' => 
    array (
      'pretty_version' => '2.24.0',
      'version' => '2.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/commerce_stock' => 
    array (
      'pretty_version' => '1.0.0-alpha5',
      'version' => '1.0.0.0-alpha5',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-alpha5',
    ),
    'drupal/commerce_store' => 
    array (
      'pretty_version' => '2.24.0',
      'version' => '2.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'drupal/config' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/config_filter' => 
    array (
      'pretty_version' => '1.8.0',
      'version' => '1.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.8',
    ),
    'drupal/config_ignore' => 
    array (
      'pretty_version' => '2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.3',
    ),
    'drupal/config_installer' => 
    array (
      'pretty_version' => '1.8.0',
      'version' => '1.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.8',
    ),
    'drupal/config_split' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.7',
    ),
    'drupal/config_translation' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/contact' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/content_moderation' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/content_translation' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/contextual' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core' => 
    array (
      'pretty_version' => '8.9.15',
      'version' => '8.9.15.0',
      'aliases' => 
      array (
      ),
      'reference' => '4804cb039c1e21f841dc4eccb24dc4a90c8280c6',
    ),
    'drupal/core-annotation' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-assertion' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-bridge' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-class-finder' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-composer-scaffold' => 
    array (
      'pretty_version' => '8.9.15',
      'version' => '8.9.15.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c902d07cb49ef73777e2b33a39e54c2861a8c81d',
    ),
    'drupal/core-datetime' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-dependency-injection' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-diff' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-discovery' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-event-dispatcher' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-file-cache' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-file-security' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-filesystem' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-gettext' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-graph' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-http-foundation' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-php-storage' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-plugin' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-proxy-builder' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-recommended' => 
    array (
      'pretty_version' => '8.9.15',
      'version' => '8.9.15.0',
      'aliases' => 
      array (
      ),
      'reference' => 'eb09bb8097d63ef7fb44d8a464dc84eb9af5141f',
    ),
    'drupal/core-render' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-serialization' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-transliteration' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-utility' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-uuid' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/core-version' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/ctools' => 
    array (
      'pretty_version' => '3.6.0',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.6',
    ),
    'drupal/datetime' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/datetime_range' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/dblog' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/devel' => 
    array (
      'pretty_version' => '4.1.1',
      'version' => '4.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '4.1.1',
    ),
    'drupal/dropzonejs' => 
    array (
      'pretty_version' => '2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.5',
    ),
    'drupal/drupal-driver' => 
    array (
      'pretty_version' => 'v2.1.1',
      'version' => '2.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a33cb7618476997e1b7330ae9225c91cbab32e1c',
    ),
    'drupal/dynamic_page_cache' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/editor' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/entity' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.2',
    ),
    'drupal/entity_clone' => 
    array (
      'pretty_version' => '1.0.0-beta6',
      'version' => '1.0.0.0-beta6',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-beta6',
    ),
    'drupal/entity_reference' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/entity_reference_revisions' => 
    array (
      'pretty_version' => '1.9.0',
      'version' => '1.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.9',
    ),
    'drupal/feeds' => 
    array (
      'pretty_version' => '3.0.0-alpha10',
      'version' => '3.0.0.0-alpha10',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.0-alpha10',
    ),
    'drupal/field' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/field_group' => 
    array (
      'pretty_version' => '3.1.0',
      'version' => '3.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.1',
    ),
    'drupal/field_layout' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/field_ui' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/file' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/filter' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/fontawesome' => 
    array (
      'pretty_version' => '2.18.0',
      'version' => '2.18.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.18',
    ),
    'drupal/fontyourface' => 
    array (
      'pretty_version' => '3.6.0',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.6',
    ),
    'drupal/forum' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/google_tag' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.4',
    ),
    'drupal/hal' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/help' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/help_topics' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/history' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/honeypot' => 
    array (
      'pretty_version' => '1.30.0',
      'version' => '1.30.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.30',
    ),
    'drupal/image' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/inline_entity_form' => 
    array (
      'pretty_version' => '1.0.0-rc9',
      'version' => '1.0.0.0-RC9',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-rc9',
    ),
    'drupal/inline_form_errors' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/jquery_ui' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.4',
    ),
    'drupal/jquery_ui_accordion' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/jquery_ui_tooltip' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/jsonapi' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/language' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/layout_builder' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/layout_builder_modal' => 
    array (
      'pretty_version' => '1.1.0',
      'version' => '1.1.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.1',
    ),
    'drupal/layout_builder_restrictions' => 
    array (
      'pretty_version' => '2.8.0',
      'version' => '2.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.8',
    ),
    'drupal/layout_discovery' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/link' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/locale' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/mailsystem' => 
    array (
      'pretty_version' => '4.3.0',
      'version' => '4.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-4.3',
    ),
    'drupal/media' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/media_bulk_upload' => 
    array (
      'pretty_version' => '1.0.0-alpha27',
      'version' => '1.0.0.0-alpha27',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-alpha27',
    ),
    'drupal/media_entity_actions' => 
    array (
      'pretty_version' => '2.0.0-alpha1',
      'version' => '2.0.0.0-alpha1',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.0-alpha1',
    ),
    'drupal/media_library' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/media_library_form_element' => 
    array (
      'pretty_version' => '1.3.0',
      'version' => '1.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.3',
    ),
    'drupal/media_library_theme_reset' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0',
    ),
    'drupal/menu_block' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.7',
    ),
    'drupal/menu_link_content' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/menu_ui' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/metatag' => 
    array (
      'pretty_version' => '1.16.0',
      'version' => '1.16.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.16',
    ),
    'drupal/migrate' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/migrate_drupal' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/migrate_drupal_multilingual' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/migrate_drupal_ui' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/mimemail' => 
    array (
      'pretty_version' => 'dev-1.x',
      'version' => 'dev-1.x',
      'aliases' => 
      array (
        0 => '1.x-dev',
      ),
      'reference' => 'e72b92ec995695aa73f767ed2ab94f80be10d2cd',
    ),
    'drupal/minimal' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/node' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/options' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/page_cache' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/paragraphs' => 
    array (
      'pretty_version' => '1.12.0',
      'version' => '1.12.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.12',
    ),
    'drupal/path' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/path_alias' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/pathauto' => 
    array (
      'pretty_version' => '1.8.0',
      'version' => '1.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.8',
    ),
    'drupal/profile' => 
    array (
      'pretty_version' => '1.2.0',
      'version' => '1.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.2',
    ),
    'drupal/quick_node_clone' => 
    array (
      'pretty_version' => '1.14.0',
      'version' => '1.14.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.14',
    ),
    'drupal/quickedit' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/rabbit_hole' => 
    array (
      'pretty_version' => '1.0.0-beta10',
      'version' => '1.0.0.0-beta10',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0-beta10',
    ),
    'drupal/rdf' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/responsive_favicons' => 
    array (
      'pretty_version' => '1.6.0',
      'version' => '1.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.6',
    ),
    'drupal/responsive_image' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/rest' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/search' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/serialization' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/settings_tray' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/seven' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/shortcut' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/simple_instagram_feed' => 
    array (
      'pretty_version' => '3.11.0',
      'version' => '3.11.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.11',
    ),
    'drupal/simple_sitemap' => 
    array (
      'pretty_version' => '3.10.0',
      'version' => '3.10.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.10',
    ),
    'drupal/simplenews' => 
    array (
      'pretty_version' => '2.0.0-beta2',
      'version' => '2.0.0.0-beta2',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.0-beta2',
    ),
    'drupal/simpletest' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/sitewide_alert' => 
    array (
      'pretty_version' => '1.6.0',
      'version' => '1.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.6',
    ),
    'drupal/smtp' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0',
    ),
    'drupal/standard' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/stark' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/state_machine' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.0',
    ),
    'drupal/statistics' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/svg_image' => 
    array (
      'pretty_version' => '1.14.0',
      'version' => '1.14.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.14',
    ),
    'drupal/syslog' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/system' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/taxonomy' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/telephone' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/text' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/token' => 
    array (
      'pretty_version' => '1.9.0',
      'version' => '1.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.9',
    ),
    'drupal/toolbar' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/tour' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/tracker' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/twig_tweak' => 
    array (
      'pretty_version' => '2.9.0',
      'version' => '2.9.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.9',
    ),
    'drupal/update' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/upgrade_status' => 
    array (
      'pretty_version' => '3.5.0',
      'version' => '3.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-3.5',
    ),
    'drupal/user' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/video_embed_field' => 
    array (
      'pretty_version' => '2.4.0',
      'version' => '2.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-2.4',
    ),
    'drupal/view_unpublished' => 
    array (
      'pretty_version' => 'dev-1.x',
      'version' => 'dev-1.x',
      'aliases' => 
      array (
        0 => '1.x-dev',
      ),
      'reference' => '8a17dec53293ded66bb1b1c5511b001ed21b4160',
    ),
    'drupal/views' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/views_ajax_history' => 
    array (
      'pretty_version' => '1.5.0',
      'version' => '1.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.5',
    ),
    'drupal/views_ui' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/viewsreference' => 
    array (
      'pretty_version' => '1.7.0',
      'version' => '1.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8.x-1.7',
    ),
    'drupal/webform' => 
    array (
      'pretty_version' => '6.0.3',
      'version' => '6.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '6.0.3',
    ),
    'drupal/workflows' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/workspaces' => 
    array (
      'replaced' => 
      array (
        0 => '8.9.15',
      ),
    ),
    'drupal/zurb_foundation' => 
    array (
      'pretty_version' => 'dev-6.x',
      'version' => 'dev-6.x',
      'aliases' => 
      array (
        0 => '6.x-dev',
      ),
      'reference' => 'cff12d9e4e73ac308f76cc023f501706b9e4aff8',
    ),
    'drush-ops/behat-drush-endpoint' => 
    array (
      'pretty_version' => '9.4.0',
      'version' => '9.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '7a19d5fd6d91890b1e67c0290bd33f0184b5cadb',
    ),
    'drush/drush' => 
    array (
      'pretty_version' => '9.7.3',
      'version' => '9.7.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '6ab9a89ab18189618eea40bf8e6553c1817ee210',
    ),
    'easyrdf/easyrdf' => 
    array (
      'pretty_version' => '0.9.1',
      'version' => '0.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'acd09dfe0555fbcfa254291e433c45fdd4652566',
    ),
    'egulias/email-validator' => 
    array (
      'pretty_version' => '2.1.17',
      'version' => '2.1.17.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ade6887fd9bd74177769645ab5c474824f8a418a',
    ),
    'enshrined/svg-sanitize' => 
    array (
      'pretty_version' => '0.14.0',
      'version' => '0.14.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'beff89576a72540ee99476aeb9cfe98222e76fb8',
    ),
    'enyo/dropzone' => 
    array (
      'pretty_version' => '5.7.0',
      'version' => '5.7.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'grasmash/expander' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '95d6037344a4be1dd5f8e0b0b2571a28c397578f',
    ),
    'grasmash/yaml-expander' => 
    array (
      'pretty_version' => '1.4.0',
      'version' => '1.4.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3f0f6001ae707a24f4d9733958d77d92bf9693b1',
    ),
    'guzzlehttp/guzzle' => 
    array (
      'pretty_version' => '6.5.4',
      'version' => '6.5.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a4a1b6930528a8f7ee03518e6442ec7a44155d9d',
    ),
    'guzzlehttp/promises' => 
    array (
      'pretty_version' => 'v1.3.1',
      'version' => '1.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a59da6cf61d80060647ff4d3eb2c03a2bc694646',
    ),
    'guzzlehttp/psr7' => 
    array (
      'pretty_version' => '1.6.1',
      'version' => '1.6.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '239400de7a173fe9901b9ac7c06497751f00727a',
    ),
    'jqueryinstagramfeed/jqueryinstagramfeed' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'kenwheeler/slick' => 
    array (
      'pretty_version' => '1.8.0',
      'version' => '1.8.0.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'kylefox/jquery-modal' => 
    array (
      'pretty_version' => '0.9.1',
      'version' => '0.9.1.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'laminas/laminas-diactoros' => 
    array (
      'pretty_version' => '1.8.7p2',
      'version' => '1.8.7.0-patch2',
      'aliases' => 
      array (
      ),
      'reference' => '6991c1af7c8d2c8efee81b22ba97024781824aaa',
    ),
    'laminas/laminas-escaper' => 
    array (
      'pretty_version' => '2.6.1',
      'version' => '2.6.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '25f2a053eadfa92ddacb609dcbbc39362610da70',
    ),
    'laminas/laminas-feed' => 
    array (
      'pretty_version' => '2.12.2',
      'version' => '2.12.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '8a193ac96ebcb3e16b6ee754ac2a889eefacb654',
    ),
    'laminas/laminas-servicemanager' => 
    array (
      'pretty_version' => '3.6.4',
      'version' => '3.6.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b1445e1a7077c21b0fad0974a1b7a11b9dbe0828',
    ),
    'laminas/laminas-stdlib' => 
    array (
      'pretty_version' => '3.2.1',
      'version' => '3.2.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '2b18347625a2f06a1a485acfbc870f699dbe51c6',
    ),
    'laminas/laminas-text' => 
    array (
      'pretty_version' => '2.8.1',
      'version' => '2.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd696fa1fb3880b9b8f02c08be58685013b421608',
    ),
    'laminas/laminas-zendframework-bridge' => 
    array (
      'pretty_version' => '1.0.4',
      'version' => '1.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fcd87520e4943d968557803919523772475e8ea3',
    ),
    'league/container' => 
    array (
      'pretty_version' => '2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8438dc47a0674e3378bcce893a0a04d79a2c22b3',
    ),
    'masterminds/html5' => 
    array (
      'pretty_version' => '2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2c37c6c520b995b761674de3be8455a381679067',
    ),
    'mathieuviossat/arraytotexttable' => 
    array (
      'pretty_version' => 'v1.0.8',
      'version' => '1.0.8.0',
      'aliases' => 
      array (
      ),
      'reference' => '6b1af924478cb9c3a903269e304fff006fe0dbf4',
    ),
    'mglaman/phpstan-drupal' => 
    array (
      'pretty_version' => '0.12.10',
      'version' => '0.12.10.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b8b6642861662cefb86bf19d9faab01715f38b68',
    ),
    'michalsnik/aos' => 
    array (
      'pretty_version' => '2.3.3',
      'version' => '2.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => NULL,
    ),
    'nette/finder' => 
    array (
      'pretty_version' => 'v2.5.2',
      'version' => '2.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '4ad2c298eb8c687dd0e74ae84206a4186eeaed50',
    ),
    'nette/utils' => 
    array (
      'pretty_version' => 'v3.2.2',
      'version' => '3.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '967cfc4f9a1acd5f1058d76715a424c53343c20c',
    ),
    'nikic/php-parser' => 
    array (
      'pretty_version' => 'v4.10.5',
      'version' => '4.10.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '4432ba399e47c66624bc73c8c0f811e5c109576f',
    ),
    'orno/di' => 
    array (
      'replaced' => 
      array (
        0 => '~2.0',
      ),
    ),
    'pantheon-systems/drupal-integrations' => 
    array (
      'pretty_version' => '8.0.4',
      'version' => '8.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ef88532ebffb23d7b9081a84e2818cb872d5316e',
    ),
    'pantheon-systems/example-drops-8-composer' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => 'b06f70a3be9e1c06dc92b6f23e5d790ade43e7eb',
    ),
    'pantheon-systems/quicksilver-pushback' => 
    array (
      'pretty_version' => '2.0.2',
      'version' => '2.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '5f0def4e0f31b1bbde6a6ac126792161e75c750b',
    ),
    'paragonie/random_compat' => 
    array (
      'pretty_version' => 'v9.99.99',
      'version' => '9.99.99.0',
      'aliases' => 
      array (
      ),
      'reference' => '84b4dfb120c6f9b4ff7b3685f9b8f1aa365a0c95',
    ),
    'pear/archive_tar' => 
    array (
      'pretty_version' => '1.4.13',
      'version' => '1.4.13.0',
      'aliases' => 
      array (
      ),
      'reference' => '2b87b41178cc6d4ad3cba678a46a1cae49786011',
    ),
    'pear/console_getopt' => 
    array (
      'pretty_version' => 'v1.4.3',
      'version' => '1.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a41f8d3e668987609178c7c4a9fe48fecac53fa0',
    ),
    'pear/pear-core-minimal' => 
    array (
      'pretty_version' => 'v1.10.10',
      'version' => '1.10.10.0',
      'aliases' => 
      array (
      ),
      'reference' => '625a3c429d9b2c1546438679074cac1b089116a7',
    ),
    'pear/pear_exception' => 
    array (
      'pretty_version' => 'v1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dbb42a5a0e45f3adcf99babfb2a1ba77b8ac36a7',
    ),
    'phpmailer/phpmailer' => 
    array (
      'pretty_version' => 'v6.4.1',
      'version' => '6.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '9256f12d8fb0cd0500f93b19e18c356906cbed3d',
    ),
    'phpstan/phpstan' => 
    array (
      'pretty_version' => '0.12.88',
      'version' => '0.12.88.0',
      'aliases' => 
      array (
      ),
      'reference' => '464d1a81af49409c41074aa6640ed0c4cbd9bb68',
    ),
    'phpstan/phpstan-deprecation-rules' => 
    array (
      'pretty_version' => '0.12.6',
      'version' => '0.12.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '46dbd43c2db973d2876d6653e53f5c2cc3a01fbb',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
    ),
    'psr/container-implementation' => 
    array (
      'provided' => 
      array (
        0 => '^1.0',
        1 => '1.0',
      ),
    ),
    'psr/http-message' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f6561bf28d520154e4b0ec72be95418abe6d9363',
    ),
    'psr/http-message-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.3',
      'version' => '1.1.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '0f73288fd15629204f9d42b7055f72dacbe811fc',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psy/psysh' => 
    array (
      'pretty_version' => 'v0.10.8',
      'version' => '0.10.8.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e4573f47750dd6c92dca5aee543fa77513cbd8d3',
    ),
    'ralouphie/getallheaders' => 
    array (
      'pretty_version' => '3.0.3',
      'version' => '3.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '120b605dfeb996808c31b6477290a714d356e822',
    ),
    'roundcube/plugin-installer' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'rsky/pear-core-min' => 
    array (
      'replaced' => 
      array (
        0 => 'v1.10.10',
      ),
    ),
    'shama/baton' => 
    array (
      'replaced' => 
      array (
        0 => '*',
      ),
    ),
    'squizlabs/php_codesniffer' => 
    array (
      'pretty_version' => '3.6.0',
      'version' => '3.6.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ffced0d2c8fa8e6cdc4d695a743271fab6c38625',
    ),
    'stack/builder' => 
    array (
      'pretty_version' => 'v1.0.5',
      'version' => '1.0.5.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fb3d136d04c6be41120ebf8c0cc71fe9507d750a',
    ),
    'symfony-cmf/routing' => 
    array (
      'pretty_version' => '1.4.1',
      'version' => '1.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fb1e7f85ff8c6866238b7e73a490a0a0243ae8ac',
    ),
    'symfony/class-loader' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e4636a4f23f157278a19e5db160c63de0da297d8',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bfe29ead7e7b1cc9ce74c6a40d06ad1f96fced13',
    ),
    'symfony/debug' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => '518c6a00d0872da30bd06aee3ea59a0a5cf54d6d',
    ),
    'symfony/dependency-injection' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e39380b7104b0ec538a075ae919f00c7e5267bac',
    ),
    'symfony/event-dispatcher' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => '14d978f8e8555f2de719c00eb65376be7d2e9081',
    ),
    'symfony/filesystem' => 
    array (
      'pretty_version' => 'v4.4.22',
      'version' => '4.4.22.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f0f06656a18304cdeacb2c4c0113a2b78a2b4c2a',
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v4.4.24',
      'version' => '4.4.24.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a96bc19ed87c88eec78e1a4c803bdc1446952983',
    ),
    'symfony/http-foundation' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fbd216d2304b1a3fe38d6392b04729c8dd356359',
    ),
    'symfony/http-kernel' => 
    array (
      'pretty_version' => 'v3.4.44',
      'version' => '3.4.44.0',
      'aliases' => 
      array (
      ),
      'reference' => '27dcaa8c6b18c75df9f37badeb4d3564ffaa1326',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e94c8b1bbe2bc77507a1056cdb06451c75b427f9',
    ),
    'symfony/polyfill-iconv' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c4de7601eefbf25f9d47190abe07f79fe0a27424',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '3bff59ea7047e925be6b7f2059d60af31bb46d6a',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fa79b11539418b02fc5e1897267673ba2c19419c',
    ),
    'symfony/polyfill-php56' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e3c8c138280cdfe4b81488441555583aa1984e23',
    ),
    'symfony/polyfill-php70' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '82225c2d7d23d7e70515496d249c0152679b468e',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'f048e612a3905f34931127360bdd2def19a5e582',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.22.1',
      'version' => '1.22.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'dc3063ba22c2a1fd2f45ed856374d79114998f91',
    ),
    'symfony/polyfill-util' => 
    array (
      'pretty_version' => 'v1.17.0',
      'version' => '1.17.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '4afb4110fc037752cf0ce9869f9ab8162c4e20d7',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => '8a895f0c92a7c4b10db95139bcff71bdf66d4d21',
    ),
    'symfony/psr-http-message-bridge' => 
    array (
      'pretty_version' => 'v1.1.2',
      'version' => '1.1.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a33352af16f78a5ff4f9d90811536abf210df12b',
    ),
    'symfony/routing' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e0d43b6f9417ad59ecaa8e2f799b79eef417387f',
    ),
    'symfony/serializer' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => '0db90db012b1b0a04fbb2d64ae9160871cad9d4f',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b0cd62ef0ff7ec31b67d78d7fc818e2bda4e844f',
    ),
    'symfony/validator' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => '5fb88120a11a75e17b602103a893dd8b27804529',
    ),
    'symfony/var-dumper' => 
    array (
      'pretty_version' => 'v4.4.22',
      'version' => '4.4.22.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c194bcedde6295f3ec3e9eba1f5d484ea97c41a7',
    ),
    'symfony/yaml' => 
    array (
      'pretty_version' => 'v3.4.41',
      'version' => '3.4.41.0',
      'aliases' => 
      array (
      ),
      'reference' => '7233ac2bfdde24d672f5305f2b3f6b5d741ef8eb',
    ),
    'twig/twig' => 
    array (
      'pretty_version' => 'v1.42.5',
      'version' => '1.42.5.0',
      'aliases' => 
      array (
      ),
      'reference' => '87b2ea9d8f6fd014d0621ca089bb1b3769ea3f8e',
    ),
    'typo3/phar-stream-wrapper' => 
    array (
      'pretty_version' => 'v3.1.4',
      'version' => '3.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e0c1b495cfac064f4f5c4bcb6bf67bb7f345ed04',
    ),
    'webflo/drupal-finder' => 
    array (
      'pretty_version' => '1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c8e5dbe65caef285fec8057a4c718a0d4138d1ee',
    ),
    'webmozart/assert' => 
    array (
      'pretty_version' => '1.10.0',
      'version' => '1.10.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6964c76c7804814a842473e0c8fd15bab0f18e25',
    ),
    'webmozart/path-util' => 
    array (
      'pretty_version' => '2.3.0',
      'version' => '2.3.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd939f7edc24c9a1bb9c0dee5cb05d8e859490725',
    ),
    'zendframework/zend-diactoros' => 
    array (
      'replaced' => 
      array (
        0 => '~1.8.7.0',
      ),
    ),
    'zendframework/zend-escaper' => 
    array (
      'replaced' => 
      array (
        0 => '2.6.1',
      ),
    ),
    'zendframework/zend-feed' => 
    array (
      'replaced' => 
      array (
        0 => '^2.12.0',
      ),
    ),
    'zendframework/zend-servicemanager' => 
    array (
      'replaced' => 
      array (
        0 => '^3.4.0',
      ),
    ),
    'zendframework/zend-stdlib' => 
    array (
      'replaced' => 
      array (
        0 => '3.2.1',
      ),
    ),
    'zendframework/zend-text' => 
    array (
      'replaced' => 
      array (
        0 => '^2.7.1',
      ),
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}

if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}








public static function getRawData()
{
@trigger_error('getRawData only returns the first dataset loaded, which may not be what you expect. Use getAllRawData() instead which returns all datasets for all autoloaders present in the process.', E_USER_DEPRECATED);

return self::$installed;
}







public static function getAllRawData()
{
return self::getInstalled();
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}





private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}

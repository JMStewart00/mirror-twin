<?php
// @codingStandardsIgnoreFile
/**
 * @file
 * Installs feeds.
 */

use Drupal\Core\Database\Database;
use Drupal\Core\Serialization\Yaml;

$connection = Database::getConnection();

$connection->schema()->createTable('feeds_feed', [
  'fields' => [
    'fid' => [
      'type' => 'serial',
      'not null' => TRUE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ],
    'type' => [
      'type' => 'varchar_ascii',
      'not null' => TRUE,
      'length' => '32',
    ],
    'uuid' => [
      'type' => 'varchar_ascii',
      'not null' => TRUE,
      'length' => '128',
    ],
    'title' => [
      'type' => 'varchar',
      'not null' => TRUE,
      'length' => '255',
    ],
    'uid' => [
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ],
    'status' => [
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'tiny',
    ],
    'created' => [
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
    ],
    'changed' => [
      'type' => 'int',
      'not null' => FALSE,
      'size' => 'normal',
    ],
    'imported' => [
      'type' => 'int',
      'not null' => FALSE,
      'size' => 'normal',
    ],
    'next' => [
      'type' => 'int',
      'not null' => FALSE,
      'size' => 'normal',
    ],
    'queued' => [
      'type' => 'int',
      'not null' => FALSE,
      'size' => 'normal',
    ],
    'source' => [
      'type' => 'varchar',
      'length' => 2048,
      'not null' => FALSE,
    ],
    'config' => [
      'type' => 'blob',
      'size' => 'big',
      'not null' => FALSE,
    ],
    'item_count' => [
      'type' => 'int',
      'not null' => TRUE,
      'size' => 'normal',
    ],
  ],
  'primary key' => [
    'fid',
  ],
  'unique keys' => [
    'feeds_feed_field__uuid__value' => [
      'uuid',
    ],
  ],
  'indexes' => [
    'feeds_feed_field__type__target_id' => [
      'type',
    ],
    'feeds_feed_field__created' => [
      'created',
    ],
    'feeds_feed_field__uid__target_id' => [
      'uid',
    ],
  ],
  'mysql_character_set' => 'utf8mb4',
]);

$connection->schema()->createTable('feeds_subscription', [
  'fields' => [
    'fid' => [
      'type' => 'serial',
      'not null' => TRUE,
      'size' => 'normal',
      'unsigned' => TRUE,
    ],
    'topic' => [
      'type' => 'blob',
      'size' => 'big',
      'not null' => FALSE,
    ],
    'hub' => [
      'type' => 'blob',
      'size' => 'big',
      'not null' => FALSE,
    ],
    'lease' => [
      'type' => 'int',
      'not null' => FALSE,
      'size' => 'normal',
    ],
    'expires' => [
      'type' => 'int',
      'not null' => FALSE,
      'size' => 'normal',
    ],
    'secret' => [
      'type' => 'varchar',
      'length' => 32,
      'not null' => FALSE,
    ],
    'token' => [
      'type' => 'varchar',
      'length' => 20,
      'not null' => FALSE,
    ],
    'state' => [
      'type' => 'varchar',
      'length' => 32,
      'not null' => FALSE,
    ],
  ],
  'primary key' => [
    'fid',
  ],
  'mysql_character_set' => 'utf8mb4',
]);

// Set the schema version.
$connection->merge('key_value')
  ->fields([
    'value' => 'i:8004;',
    'name' => 'feeds',
    'collection' => 'system.schema',
  ])
  ->condition('collection', 'system.schema')
  ->condition('name', 'feeds')
  ->execute();

// Update core.extension.
$extensions = $connection->select('config')
  ->fields('config', ['data'])
  ->condition('collection', '')
  ->condition('name', 'core.extension')
  ->execute()
  ->fetchField();
$extensions = unserialize($extensions);
$extensions['module']['feeds'] = 8004;
$connection->update('config')
  ->fields([
    'data' => serialize($extensions),
    'collection' => '',
    'name' => 'core.extension',
  ])
  ->condition('collection', '')
  ->condition('name', 'core.extension')
  ->execute();

// Structure of feed types, some making use of a deprecated action plugin.
$feed_type_configs[] = Yaml::decode(file_get_contents(__DIR__ . '/feeds.feed_type.testfor800305.yml'));

foreach ($feed_type_configs as $feed_type_config) {
  $connection->insert('config')
    ->fields([
      'collection',
      'name',
      'data',
    ])
    ->values([
      'collection' => '',
      'name' => 'feeds.feed_type.' . $feed_type_config['id'],
      'data' => serialize($feed_type_config),
    ])
    ->execute();
}

// Insert Feeds' key_value entries.
$connection->insert('key_value')
  ->fields([
    'collection',
    'name',
    'value',
  ])
  ->values([
    'collection' => 'entity.definitions.installed',
    'name' => 'feeds_feed.entity_type',
    'value' => 'O:36:"Drupal\Core\Entity\ContentEntityType":40:{s:25:" * revision_metadata_keys";a:1:{s:16:"revision_default";s:16:"revision_default";}s:15:" * static_cache";b:1;s:15:" * render_cache";b:1;s:19:" * persistent_cache";b:1;s:14:" * entity_keys";a:8:{s:2:"id";s:3:"fid";s:6:"bundle";s:4:"type";s:5:"label";s:5:"title";s:4:"uuid";s:4:"uuid";s:8:"revision";s:0:"";s:8:"langcode";s:0:"";s:16:"default_langcode";s:16:"default_langcode";s:29:"revision_translation_affected";s:29:"revision_translation_affected";}s:5:" * id";s:10:"feeds_feed";s:16:" * originalClass";s:24:"Drupal\feeds\Entity\Feed";s:11:" * handlers";a:10:{s:7:"storage";s:24:"Drupal\feeds\FeedStorage";s:12:"view_builder";s:28:"Drupal\feeds\FeedViewBuilder";s:6:"access";s:37:"Drupal\feeds\FeedAccessControlHandler";s:10:"views_data";s:26:"Drupal\feeds\FeedViewsData";s:4:"form";a:7:{s:7:"default";s:21:"Drupal\feeds\FeedForm";s:6:"update";s:21:"Drupal\feeds\FeedForm";s:6:"delete";s:32:"Drupal\feeds\Form\FeedDeleteForm";s:6:"import";s:32:"Drupal\feeds\Form\FeedImportForm";s:15:"schedule_import";s:40:"Drupal\feeds\Form\FeedScheduleImportForm";s:5:"clear";s:31:"Drupal\feeds\Form\FeedClearForm";s:6:"unlock";s:32:"Drupal\feeds\Form\FeedUnlockForm";}s:12:"list_builder";s:28:"Drupal\feeds\FeedListBuilder";s:14:"route_provider";a:1:{s:4:"html";s:49:"Drupal\Core\Entity\Routing\AdminHtmlRouteProvider";}s:11:"feed_import";s:30:"Drupal\feeds\FeedImportHandler";s:10:"feed_clear";s:29:"Drupal\feeds\FeedClearHandler";s:11:"feed_expire";s:30:"Drupal\feeds\FeedExpireHandler";}s:19:" * admin_permission";N;s:25:" * permission_granularity";s:6:"bundle";s:8:" * links";a:9:{s:9:"canonical";s:18:"/feed/{feeds_feed}";s:8:"add-page";s:9:"/feed/add";s:8:"add-form";s:27:"/feed/add/{feeds_feed_type}";s:11:"delete-form";s:25:"/feed/{feeds_feed}/delete";s:9:"edit-form";s:23:"/feed/{feeds_feed}/edit";s:11:"import-form";s:25:"/feed/{feeds_feed}/import";s:20:"schedule-import-form";s:34:"/feed/{feeds_feed}/schedule-import";s:10:"clear-form";s:31:"/feed/{feeds_feed}/delete-items";s:6:"unlock";s:25:"/feed/{feeds_feed}/unlock";}s:21:" * bundle_entity_type";s:15:"feeds_feed_type";s:12:" * bundle_of";N;s:15:" * bundle_label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:9:"Feed type";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:13:" * base_table";s:10:"feeds_feed";s:22:" * revision_data_table";N;s:17:" * revision_table";N;s:13:" * data_table";N;s:11:" * internal";b:0;s:15:" * translatable";b:0;s:19:" * show_revision_ui";b:0;s:8:" * label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:4:"Feed";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:19:" * label_collection";s:0:"";s:17:" * label_singular";s:0:"";s:15:" * label_plural";s:0:"";s:14:" * label_count";a:0:{}s:15:" * uri_callback";N;s:8:" * group";s:7:"content";s:14:" * group_label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:7:"Content";s:12:" * arguments";a:0:{}s:10:" * options";a:1:{s:7:"context";s:17:"Entity type group";}}s:22:" * field_ui_base_route";s:32:"entity.feeds_feed_type.edit_form";s:26:" * common_reference_target";b:0;s:22:" * list_cache_contexts";a:0:{}s:18:" * list_cache_tags";a:1:{i:0;s:15:"feeds_feed_list";}s:14:" * constraints";a:2:{s:13:"EntityChanged";N;s:26:"EntityUntranslatableFields";N;}s:13:" * additional";a:3:{s:6:"module";s:5:"feeds";s:9:"fieldable";b:1;s:10:"token_type";s:10:"feeds_feed";}s:8:" * class";s:24:"Drupal\feeds\Entity\Feed";s:11:" * provider";s:5:"feeds";s:14:" * _serviceIds";a:0:{}s:18:" * _entityStorages";a:0:{}s:20:" * stringTranslation";N;}',
  ])
  ->values([
    'collection' => 'entity.definitions.installed',
    'name' => 'feeds_feed.field_storage_definitions',
    'value' => 'a:14:{s:3:"fid";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:7:"integer";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:3:"int";s:8:"unsigned";b:1;s:4:"size";s:6:"normal";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:2;s:13:" * definition";a:2:{s:4:"type";s:18:"field_item:integer";s:8:"settings";a:6:{s:8:"unsigned";b:1;s:4:"size";s:6:"normal";s:3:"min";s:0:"";s:3:"max";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";}}}s:13:" * definition";a:8:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:7:"Feed ID";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:12:"The feed ID.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:9:"read-only";b:1;s:8:"provider";s:5:"feeds";s:10:"field_name";s:3:"fid";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:4:"uuid";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:4:"uuid";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:13:"varchar_ascii";s:6:"length";i:128;s:6:"binary";b:0;}}s:11:"unique keys";a:1:{s:5:"value";a:1:{i:0;s:5:"value";}}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:40;s:13:" * definition";a:2:{s:4:"type";s:15:"field_item:uuid";s:8:"settings";a:3:{s:10:"max_length";i:128;s:8:"is_ascii";b:1;s:14:"case_sensitive";b:0;}}}s:13:" * definition";a:8:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:4:"UUID";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:14:"The feed UUID.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:9:"read-only";b:1;s:8:"provider";s:5:"feeds";s:10:"field_name";s:4:"uuid";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:4:"type";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:16:"entity_reference";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:9:"target_id";a:3:{s:11:"description";s:28:"The ID of the target entity.";s:4:"type";s:13:"varchar_ascii";s:6:"length";i:32;}}s:7:"indexes";a:1:{s:9:"target_id";a:1:{i:0;s:9:"target_id";}}s:11:"unique keys";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:77;s:13:" * definition";a:2:{s:4:"type";s:27:"field_item:entity_reference";s:8:"settings";a:3:{s:11:"target_type";s:15:"feeds_feed_type";s:7:"handler";s:7:"default";s:16:"handler_settings";a:0:{}}}}s:13:" * definition";a:8:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:9:"Feed type";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:14:"The feed type.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:9:"read-only";b:1;s:8:"provider";s:5:"feeds";s:10:"field_name";s:4:"type";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:5:"title";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:6:"string";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:7:"varchar";s:6:"length";i:255;s:6:"binary";b:0;}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:114;s:13:" * definition";a:2:{s:4:"type";s:17:"field_item:string";s:8:"settings";a:3:{s:10:"max_length";i:255;s:8:"is_ascii";b:0;s:14:"case_sensitive";b:0;}}}s:13:" * definition";a:10:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:5:"Title";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:64:"The title of this feed, always treated as non-markup plain text.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:8:"required";b:1;s:13:"default_value";a:1:{i:0;a:1:{s:5:"value";s:0:"";}}s:7:"display";a:2:{s:4:"view";a:1:{s:7:"options";a:3:{s:5:"label";s:6:"hidden";s:4:"type";s:6:"string";s:6:"weight";i:-5;}}s:4:"form";a:2:{s:7:"options";a:2:{s:4:"type";s:16:"string_textfield";s:6:"weight";i:-5;}s:12:"configurable";b:1;}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:5:"title";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:3:"uid";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:16:"entity_reference";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:9:"target_id";a:3:{s:11:"description";s:28:"The ID of the target entity.";s:4:"type";s:3:"int";s:8:"unsigned";b:1;}}s:7:"indexes";a:1:{s:9:"target_id";a:1:{i:0;s:9:"target_id";}}s:11:"unique keys";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:163;s:13:" * definition";a:2:{s:4:"type";s:27:"field_item:entity_reference";s:8:"settings";a:3:{s:11:"target_type";s:4:"user";s:7:"handler";s:7:"default";s:16:"handler_settings";a:0:{}}}}s:13:" * definition";a:10:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:11:"Authored by";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:31:"The user ID of the feed author.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:12:"revisionable";b:1;s:22:"default_value_callback";s:42:"Drupal\feeds\Entity\Feed::getCurrentUserId";s:7:"display";a:2:{s:4:"view";a:1:{s:7:"options";a:3:{s:5:"label";s:6:"hidden";s:4:"type";s:6:"author";s:6:"weight";i:0;}}s:4:"form";a:2:{s:7:"options";a:3:{s:4:"type";s:29:"entity_reference_autocomplete";s:6:"weight";i:5;s:8:"settings";a:4:{s:14:"match_operator";s:8:"CONTAINS";s:4:"size";s:2:"60";s:17:"autocomplete_type";s:4:"tags";s:11:"placeholder";s:0:"";}}s:12:"configurable";b:1;}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:3:"uid";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:6:"status";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:7:"boolean";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:2:{s:4:"type";s:3:"int";s:4:"size";s:4:"tiny";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:217;s:13:" * definition";a:2:{s:4:"type";s:18:"field_item:boolean";s:8:"settings";a:2:{s:8:"on_label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:2:"On";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:9:"off_label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:3:"Off";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}}}}s:13:" * definition";a:8:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:16:"Importing status";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:48:"A boolean indicating whether the feed is active.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:13:"default_value";a:1:{i:0;a:1:{s:5:"value";b:1;}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:6:"status";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:7:"created";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:7:"created";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:1:{s:4:"type";s:3:"int";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:258;s:13:" * definition";a:2:{s:4:"type";s:18:"field_item:created";s:8:"settings";a:0:{}}}s:13:" * definition";a:8:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:11:"Authored on";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:35:"The time that the feed was created.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:7:"display";a:2:{s:4:"view";a:1:{s:7:"options";a:3:{s:5:"label";s:6:"hidden";s:4:"type";s:9:"timestamp";s:6:"weight";i:0;}}s:4:"form";a:2:{s:7:"options";a:2:{s:4:"type";s:18:"datetime_timestamp";s:6:"weight";i:10;}s:12:"configurable";b:1;}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:7:"created";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:7:"changed";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:7:"changed";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:1:{s:4:"type";s:3:"int";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:298;s:13:" * definition";a:2:{s:4:"type";s:18:"field_item:changed";s:8:"settings";a:0:{}}}s:13:" * definition";a:7:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:7:"Changed";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:39:"The time that the feed was last edited.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:7:"changed";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:8:"imported";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:9:"timestamp";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:1:{s:4:"type";s:3:"int";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:327;s:13:" * definition";a:2:{s:4:"type";s:20:"field_item:timestamp";s:8:"settings";a:0:{}}}s:13:" * definition";a:9:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:11:"Last import";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:36:"The time that the feed was imported.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:13:"default_value";a:1:{i:0;a:1:{s:5:"value";i:0;}}s:7:"display";a:1:{s:4:"view";a:2:{s:7:"options";a:3:{s:5:"label";s:6:"inline";s:4:"type";s:13:"timestamp_ago";s:6:"weight";i:1;}s:12:"configurable";b:1;}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:8:"imported";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:4:"next";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:9:"timestamp";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:1:{s:4:"type";s:3:"int";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:366;s:13:" * definition";a:2:{s:4:"type";s:20:"field_item:timestamp";s:8:"settings";a:0:{}}}s:13:" * definition";a:9:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:11:"Next import";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:40:"The time that the feed will import next.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:13:"default_value";a:1:{i:0;a:1:{s:5:"value";i:0;}}s:7:"display";a:1:{s:4:"view";a:2:{s:7:"options";a:3:{s:5:"label";s:6:"inline";s:4:"type";s:9:"timestamp";s:6:"weight";i:1;}s:12:"configurable";b:1;}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:4:"next";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:6:"queued";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:9:"timestamp";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:1:{s:4:"type";s:3:"int";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:405;s:13:" * definition";a:2:{s:4:"type";s:20:"field_item:timestamp";s:8:"settings";a:0:{}}}s:13:" * definition";a:8:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:6:"Queued";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:60:"Time when this feed was queued for refresh, 0 if not queued.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:13:"default_value";a:1:{i:0;a:1:{s:5:"value";i:0;}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:6:"queued";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:6:"source";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:3:"uri";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:7:"varchar";s:6:"length";i:2048;s:6:"binary";b:0;}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:437;s:13:" * definition";a:2:{s:4:"type";s:14:"field_item:uri";s:8:"settings";a:2:{s:10:"max_length";i:2048;s:14:"case_sensitive";b:0;}}}s:13:" * definition";a:9:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:6:"Source";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:23:"The source of the feed.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:8:"required";b:1;s:7:"display";a:1:{s:4:"view";a:2:{s:7:"options";a:3:{s:5:"label";s:6:"inline";s:4:"type";s:14:"feeds_uri_link";s:6:"weight";i:-3;}s:12:"configurable";b:1;}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:6:"source";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:6:"config";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:3:"map";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:4:"blob";s:4:"size";s:3:"big";s:9:"serialize";b:1;}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:478;s:13:" * definition";a:2:{s:4:"type";s:14:"field_item:map";s:8:"settings";a:0:{}}}s:13:" * definition";a:7:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:6:"Config";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:23:"The config of the feed.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:6:"config";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}s:10:"item_count";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:7:"integer";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:3:"int";s:8:"unsigned";b:0;s:4:"size";s:6:"normal";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:509;s:13:" * definition";a:2:{s:4:"type";s:18:"field_item:integer";s:8:"settings";a:6:{s:8:"unsigned";b:0;s:4:"size";s:6:"normal";s:3:"min";s:0:"";s:3:"max";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";}}}s:13:" * definition";a:9:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:14:"Items imported";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:29:"The number of items imported.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:13:"default_value";a:1:{i:0;a:1:{s:5:"value";i:0;}}s:7:"display";a:1:{s:4:"view";a:1:{s:7:"options";a:3:{s:5:"label";s:6:"inline";s:4:"type";s:14:"number_integer";s:6:"weight";i:0;}}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:10:"item_count";s:11:"entity_type";s:10:"feeds_feed";s:6:"bundle";N;s:13:"initial_value";N;}}}',
  ])
  ->values([
    'collection' => 'entity.definitions.installed',
    'name' => 'feeds_feed_type.entity_type',
    'value' => 'O:42:"Drupal\Core\Config\Entity\ConfigEntityType":43:{s:16:" * config_prefix";s:9:"feed_type";s:15:" * static_cache";b:0;s:14:" * lookup_keys";a:1:{i:0;s:4:"uuid";}s:16:" * config_export";a:13:{i:0;s:2:"id";i:1;s:5:"label";i:2;s:11:"description";i:3;s:4:"help";i:4;s:13:"import_period";i:5;s:7:"fetcher";i:6;s:21:"fetcher_configuration";i:7;s:6:"parser";i:8;s:20:"parser_configuration";i:9;s:9:"processor";i:10;s:23:"processor_configuration";i:11;s:14:"custom_sources";i:12;s:8:"mappings";}s:21:" * mergedConfigExport";a:0:{}s:15:" * render_cache";b:1;s:19:" * persistent_cache";b:1;s:14:" * entity_keys";a:9:{s:2:"id";s:2:"id";s:5:"label";s:5:"label";s:4:"uuid";s:4:"uuid";s:6:"status";s:6:"status";s:8:"revision";s:0:"";s:6:"bundle";s:0:"";s:8:"langcode";s:8:"langcode";s:16:"default_langcode";s:16:"default_langcode";s:29:"revision_translation_affected";s:29:"revision_translation_affected";}s:5:" * id";s:15:"feeds_feed_type";s:16:" * originalClass";s:28:"Drupal\feeds\Entity\FeedType";s:11:" * handlers";a:5:{s:6:"access";s:41:"Drupal\feeds\FeedTypeAccessControlHandler";s:12:"list_builder";s:32:"Drupal\feeds\FeedTypeListBuilder";s:14:"route_provider";a:1:{s:4:"html";s:49:"Drupal\Core\Entity\Routing\AdminHtmlRouteProvider";}s:4:"form";a:4:{s:7:"default";s:25:"Drupal\feeds\FeedTypeForm";s:6:"create";s:25:"Drupal\feeds\FeedTypeForm";s:4:"edit";s:25:"Drupal\feeds\FeedTypeForm";s:6:"delete";s:36:"Drupal\feeds\Form\FeedTypeDeleteForm";}s:7:"storage";s:45:"Drupal\Core\Config\Entity\ConfigEntityStorage";}s:19:" * admin_permission";s:16:"administer feeds";s:25:" * permission_granularity";s:11:"entity_type";s:8:" * links";a:5:{s:10:"collection";s:22:"/admin/structure/feeds";s:8:"add-form";s:26:"/admin/structure/feeds/add";s:9:"edit-form";s:47:"/admin/structure/feeds/manage/{feeds_feed_type}";s:7:"mapping";s:55:"/admin/structure/feeds/manage/{feeds_feed_type}/mapping";s:11:"delete-form";s:54:"/admin/structure/feeds/manage/{feeds_feed_type}/delete";}s:21:" * bundle_entity_type";N;s:12:" * bundle_of";s:10:"feeds_feed";s:15:" * bundle_label";N;s:13:" * base_table";N;s:22:" * revision_data_table";N;s:17:" * revision_table";N;s:13:" * data_table";N;s:11:" * internal";b:0;s:15:" * translatable";b:0;s:19:" * show_revision_ui";b:0;s:8:" * label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:9:"Feed type";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:19:" * label_collection";s:0:"";s:17:" * label_singular";s:0:"";s:15:" * label_plural";s:0:"";s:14:" * label_count";a:0:{}s:15:" * uri_callback";N;s:8:" * group";s:13:"configuration";s:14:" * group_label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:13:"Configuration";s:12:" * arguments";a:0:{}s:10:" * options";a:1:{s:7:"context";s:17:"Entity type group";}}s:22:" * field_ui_base_route";N;s:26:" * common_reference_target";b:0;s:22:" * list_cache_contexts";a:0:{}s:18:" * list_cache_tags";a:1:{i:0;s:27:"config:feeds_feed_type_list";}s:14:" * constraints";a:0:{}s:13:" * additional";a:2:{s:6:"module";s:5:"feeds";s:10:"token_type";s:15:"feeds_feed_type";}s:8:" * class";s:28:"Drupal\feeds\Entity\FeedType";s:11:" * provider";s:5:"feeds";s:14:" * _serviceIds";a:0:{}s:18:" * _entityStorages";a:0:{}s:20:" * stringTranslation";N;}',
  ])
  ->values([
    'collection' => 'entity.definitions.installed',
    'name' => 'feeds_subscription.entity_type',
    'value' => 'O:36:"Drupal\Core\Entity\ContentEntityType":42:{s:25:" * revision_metadata_keys";a:1:{s:16:"revision_default";s:16:"revision_default";}s:31:" * requiredRevisionMetadataKeys";a:1:{s:16:"revision_default";s:16:"revision_default";}s:15:" * static_cache";b:1;s:15:" * render_cache";b:1;s:19:" * persistent_cache";b:1;s:14:" * entity_keys";a:6:{s:2:"id";s:3:"fid";s:8:"revision";s:0:"";s:6:"bundle";s:0:"";s:8:"langcode";s:0:"";s:16:"default_langcode";s:16:"default_langcode";s:29:"revision_translation_affected";s:29:"revision_translation_affected";}s:5:" * id";s:18:"feeds_subscription";s:16:" * originalClass";s:32:"Drupal\feeds\Entity\Subscription";s:11:" * handlers";a:3:{s:6:"access";s:45:"Drupal\Core\Entity\EntityAccessControlHandler";s:7:"storage";s:46:"Drupal\Core\Entity\Sql\SqlContentEntityStorage";s:12:"view_builder";s:36:"Drupal\Core\Entity\EntityViewBuilder";}s:19:" * admin_permission";N;s:25:" * permission_granularity";s:11:"entity_type";s:8:" * links";a:0:{}s:17:" * label_callback";N;s:21:" * bundle_entity_type";N;s:12:" * bundle_of";N;s:15:" * bundle_label";N;s:13:" * base_table";s:18:"feeds_subscription";s:22:" * revision_data_table";N;s:17:" * revision_table";N;s:13:" * data_table";N;s:11:" * internal";b:0;s:15:" * translatable";b:0;s:19:" * show_revision_ui";b:0;s:8:" * label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:12:"Subscription";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:19:" * label_collection";s:0:"";s:17:" * label_singular";s:0:"";s:15:" * label_plural";s:0:"";s:14:" * label_count";a:0:{}s:15:" * uri_callback";N;s:8:" * group";s:7:"content";s:14:" * group_label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:7:"Content";s:12:" * arguments";a:0:{}s:10:" * options";a:1:{s:7:"context";s:17:"Entity type group";}}s:22:" * field_ui_base_route";N;s:26:" * common_reference_target";b:0;s:22:" * list_cache_contexts";a:0:{}s:18:" * list_cache_tags";a:1:{i:0;s:23:"feeds_subscription_list";}s:14:" * constraints";a:1:{s:26:"EntityUntranslatableFields";N;}s:13:" * additional";a:1:{s:6:"module";s:5:"feeds";}s:8:" * class";s:32:"Drupal\feeds\Entity\Subscription";s:11:" * provider";s:5:"feeds";s:14:" * _serviceIds";a:0:{}s:18:" * _entityStorages";a:0:{}s:20:" * stringTranslation";N;}',
  ])
  ->values([
    'collection' => 'entity.definitions.installed',
    'name' => 'feeds_subscription.field_storage_definitions',
    'value' => 'a:8:{s:3:"fid";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:7:"integer";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:3:"int";s:8:"unsigned";b:1;s:4:"size";s:6:"normal";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:2;s:13:" * definition";a:2:{s:4:"type";s:18:"field_item:integer";s:8:"settings";a:6:{s:8:"unsigned";b:1;s:4:"size";s:6:"normal";s:3:"min";s:0:"";s:3:"max";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";}}}s:13:" * definition";a:8:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:7:"Feed ID";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:12:"The feed ID.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:9:"read-only";b:1;s:8:"provider";s:5:"feeds";s:10:"field_name";s:3:"fid";s:11:"entity_type";s:18:"feeds_subscription";s:6:"bundle";N;s:13:"initial_value";N;}}s:5:"topic";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:3:"uri";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:7:"varchar";s:6:"length";i:2048;s:6:"binary";b:0;}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:40;s:13:" * definition";a:2:{s:4:"type";s:14:"field_item:uri";s:8:"settings";a:2:{s:10:"max_length";i:2048;s:14:"case_sensitive";b:0;}}}s:13:" * definition";a:9:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:5:"Topic";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:36:"The fully-qualified URL of the feed.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:9:"read-only";b:1;s:8:"required";b:1;s:8:"provider";s:5:"feeds";s:10:"field_name";s:5:"topic";s:11:"entity_type";s:18:"feeds_subscription";s:6:"bundle";N;s:13:"initial_value";N;}}s:3:"hub";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:3:"uri";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:7:"varchar";s:6:"length";i:2048;s:6:"binary";b:0;}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:75;s:13:" * definition";a:2:{s:4:"type";s:14:"field_item:uri";s:8:"settings";a:2:{s:10:"max_length";i:2048;s:14:"case_sensitive";b:0;}}}s:13:" * definition";a:9:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:3:"Hub";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:40:"The fully-qualified URL of the PuSH hub.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:9:"read-only";b:1;s:8:"required";b:1;s:8:"provider";s:5:"feeds";s:10:"field_name";s:3:"hub";s:11:"entity_type";s:18:"feeds_subscription";s:6:"bundle";N;s:13:"initial_value";N;}}s:5:"lease";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:7:"integer";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:3:"int";s:8:"unsigned";b:0;s:4:"size";s:6:"normal";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:110;s:13:" * definition";a:2:{s:4:"type";s:18:"field_item:integer";s:8:"settings";a:6:{s:8:"unsigned";b:0;s:4:"size";s:6:"normal";s:3:"min";s:0:"";s:3:"max";s:0:"";s:6:"prefix";s:0:"";s:6:"suffix";s:0:"";}}}s:13:" * definition";a:7:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:10:"Lease time";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:34:"The time, in seconds of the lease.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:5:"lease";s:11:"entity_type";s:18:"feeds_subscription";s:6:"bundle";N;s:13:"initial_value";N;}}s:7:"expires";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:9:"timestamp";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:1:{s:4:"type";s:3:"int";}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:147;s:13:" * definition";a:2:{s:4:"type";s:20:"field_item:timestamp";s:8:"settings";a:0:{}}}s:13:" * definition";a:7:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:7:"Expires";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:49:"The UNIX timestamp when the subscription expires.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:7:"expires";s:11:"entity_type";s:18:"feeds_subscription";s:6:"bundle";N;s:13:"initial_value";N;}}s:6:"secret";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:6:"string";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:13:"varchar_ascii";s:6:"length";i:32;s:6:"binary";b:0;}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:176;s:13:" * definition";a:2:{s:4:"type";s:17:"field_item:string";s:8:"settings";a:3:{s:10:"max_length";i:32;s:8:"is_ascii";b:1;s:14:"case_sensitive";b:0;}}}s:13:" * definition";a:9:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:6:"Secret";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:36:"The secret used to verify a request.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:9:"read-only";b:1;s:8:"required";b:1;s:8:"provider";s:5:"feeds";s:10:"field_name";s:6:"secret";s:11:"entity_type";s:18:"feeds_subscription";s:6:"bundle";N;s:13:"initial_value";N;}}s:5:"token";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:6:"string";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:13:"varchar_ascii";s:6:"length";i:20;s:6:"binary";b:0;}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:212;s:13:" * definition";a:2:{s:4:"type";s:17:"field_item:string";s:8:"settings";a:3:{s:10:"max_length";i:20;s:8:"is_ascii";b:1;s:14:"case_sensitive";b:0;}}}s:13:" * definition";a:9:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:5:"Token";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:34:"The token used as part of the URL.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:9:"read-only";b:1;s:8:"required";b:1;s:8:"provider";s:5:"feeds";s:10:"field_name";s:5:"token";s:11:"entity_type";s:18:"feeds_subscription";s:6:"bundle";N;s:13:"initial_value";N;}}s:5:"state";O:37:"Drupal\Core\Field\BaseFieldDefinition":5:{s:7:" * type";s:6:"string";s:9:" * schema";a:4:{s:7:"columns";a:1:{s:5:"value";a:3:{s:4:"type";s:13:"varchar_ascii";s:6:"length";i:32;s:6:"binary";b:0;}}s:11:"unique keys";a:0:{}s:7:"indexes";a:0:{}s:12:"foreign keys";a:0:{}}s:10:" * indexes";a:0:{}s:17:" * itemDefinition";O:51:"Drupal\Core\Field\TypedData\FieldItemDataDefinition":2:{s:18:" * fieldDefinition";r:248;s:13:" * definition";a:2:{s:4:"type";s:17:"field_item:string";s:8:"settings";a:3:{s:10:"max_length";i:32;s:8:"is_ascii";b:1;s:14:"case_sensitive";b:0;}}}s:13:" * definition";a:9:{s:5:"label";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:5:"State";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:11:"description";O:48:"Drupal\Core\StringTranslation\TranslatableMarkup":3:{s:9:" * string";s:30:"The state of the subscription.";s:12:" * arguments";a:0:{}s:10:" * options";a:0:{}}s:8:"required";b:1;s:13:"default_value";a:1:{i:0;a:1:{s:5:"value";s:12:"unsubscribed";}}s:8:"provider";s:5:"feeds";s:10:"field_name";s:5:"state";s:11:"entity_type";s:18:"feeds_subscription";s:6:"bundle";N;s:13:"initial_value";N;}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.entity_schema_data',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:11:"primary key";a:1:{i:0;s:3:"fid";}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.changed',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:7:"changed";a:2:{s:4:"type";s:3:"int";s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.config',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:6:"config";a:4:{s:4:"type";s:4:"blob";s:4:"size";s:3:"big";s:9:"serialize";b:1;s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.created',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:7:"created";a:2:{s:4:"type";s:3:"int";s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.fid',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:3:"fid";a:4:{s:4:"type";s:6:"serial";s:8:"unsigned";b:1;s:4:"size";s:6:"normal";s:8:"not null";b:1;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.imported',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:8:"imported";a:2:{s:4:"type";s:3:"int";s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.item_count',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:10:"item_count";a:4:{s:4:"type";s:3:"int";s:8:"unsigned";b:0;s:4:"size";s:6:"normal";s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.next',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:4:"next";a:2:{s:4:"type";s:3:"int";s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.queued',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:6:"queued";a:2:{s:4:"type";s:3:"int";s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.source',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:6:"source";a:4:{s:4:"type";s:7:"varchar";s:6:"length";i:2048;s:6:"binary";b:0;s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.status',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:6:"status";a:3:{s:4:"type";s:3:"int";s:4:"size";s:4:"tiny";s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.title',
    'value' => 'a:1:{s:10:"feeds_feed";a:1:{s:6:"fields";a:1:{s:5:"title";a:4:{s:4:"type";s:7:"varchar";s:6:"length";i:255;s:6:"binary";b:0;s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.type',
    'value' => 'a:1:{s:10:"feeds_feed";a:2:{s:6:"fields";a:1:{s:4:"type";a:4:{s:11:"description";s:28:"The ID of the target entity.";s:4:"type";s:13:"varchar_ascii";s:6:"length";i:32;s:8:"not null";b:1;}}s:7:"indexes";a:1:{s:33:"feeds_feed_field__type__target_id";a:1:{i:0;s:4:"type";}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.uid',
    'value' => 'a:1:{s:10:"feeds_feed";a:2:{s:6:"fields";a:1:{s:3:"uid";a:4:{s:11:"description";s:28:"The ID of the target entity.";s:4:"type";s:3:"int";s:8:"unsigned";b:1;s:8:"not null";b:0;}}s:7:"indexes";a:1:{s:32:"feeds_feed_field__uid__target_id";a:1:{i:0;s:3:"uid";}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_feed.field_schema_data.uuid',
    'value' => 'a:1:{s:10:"feeds_feed";a:2:{s:6:"fields";a:1:{s:4:"uuid";a:4:{s:4:"type";s:13:"varchar_ascii";s:6:"length";i:128;s:6:"binary";b:0;s:8:"not null";b:1;}}s:11:"unique keys";a:1:{s:29:"feeds_feed_field__uuid__value";a:1:{i:0;s:4:"uuid";}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_subscription.entity_schema_data',
    'value' => 'a:1:{s:18:"feeds_subscription";a:1:{s:11:"primary key";a:1:{i:0;s:3:"fid";}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_subscription.field_schema_data.expires',
    'value' => 'a:1:{s:18:"feeds_subscription";a:1:{s:6:"fields";a:1:{s:7:"expires";a:2:{s:4:"type";s:3:"int";s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_subscription.field_schema_data.fid',
    'value' => 'a:1:{s:18:"feeds_subscription";a:1:{s:6:"fields";a:1:{s:3:"fid";a:4:{s:4:"type";s:6:"serial";s:8:"unsigned";b:1;s:4:"size";s:6:"normal";s:8:"not null";b:1;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_subscription.field_schema_data.hub',
    'value' => 'a:1:{s:18:"feeds_subscription";a:1:{s:6:"fields";a:1:{s:3:"hub";a:4:{s:4:"type";s:7:"varchar";s:6:"length";i:2048;s:6:"binary";b:0;s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_subscription.field_schema_data.lease',
    'value' => 'a:1:{s:18:"feeds_subscription";a:1:{s:6:"fields";a:1:{s:5:"lease";a:4:{s:4:"type";s:3:"int";s:8:"unsigned";b:0;s:4:"size";s:6:"normal";s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_subscription.field_schema_data.secret',
    'value' => 'a:1:{s:18:"feeds_subscription";a:1:{s:6:"fields";a:1:{s:6:"secret";a:4:{s:4:"type";s:13:"varchar_ascii";s:6:"length";i:32;s:6:"binary";b:0;s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_subscription.field_schema_data.state',
    'value' => 'a:1:{s:18:"feeds_subscription";a:1:{s:6:"fields";a:1:{s:5:"state";a:4:{s:4:"type";s:13:"varchar_ascii";s:6:"length";i:32;s:6:"binary";b:0;s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_subscription.field_schema_data.token',
    'value' => 'a:1:{s:18:"feeds_subscription";a:1:{s:6:"fields";a:1:{s:5:"token";a:4:{s:4:"type";s:13:"varchar_ascii";s:6:"length";i:20;s:6:"binary";b:0;s:8:"not null";b:0;}}}}',
  ])
  ->values([
    'collection' => 'entity.storage_schema.sql',
    'name' => 'feeds_subscription.field_schema_data.topic',
    'value' => 'a:1:{s:18:"feeds_subscription";a:1:{s:6:"fields";a:1:{s:5:"topic";a:4:{s:4:"type";s:7:"varchar";s:6:"length";i:2048;s:6:"binary";b:0;s:8:"not null";b:0;}}}}',
  ])
  ->execute();

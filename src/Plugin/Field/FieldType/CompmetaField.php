<?php

namespace Drupal\compmeta02\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 * Plugin implementation of the 'address' field type.
 *
 * @FieldType(
 *   id = "Compoundmeta",
 *   module = "compmeta02",
 *   label = @Translation("Compoundmeta Field"),
 *   description = @Translation("Compoundmeta field."),
 *   category = @Translation("Compoundmeta"),
 *   default_widget = "CompmetaWidget"
 * )
 */
class CompmetaField extends FieldItemBase {

  /**
   * Field type properties definition.
   * 
   * Inside this method we defines all the fields (properties) that our 
   * custom field type will have.
   * 
   * Here there is a list of allowed property types: https://goo.gl/sIBBgO
   */
  public static function propertyDefinitions(StorageDefinition $storage) {

    $properties = [];
    
    $properties['description'] = DataDefinition::create('string')
      ->setLabel(t('Description'));               
    
    $properties['title'] = DataDefinition::create('string')
      ->setLabel(t('Title'));
      
    $properties['thumb_url'] = DataDefinition::create('string')
      ->setLabel(t('Thumb Url'));  
    
    $properties['article_url'] = DataDefinition::create('string')
      ->setLabel(t('Article Url'));    
      
    return $properties;
  }

  /**
   * Field type schema definition.
   * 
   * Inside this method we defines the database schema used to store data for 
   * our field type.
   * 
   * Here there is a list of allowed column types: https://goo.gl/YY3G7s
   */
  public static function schema(StorageDefinition $storage) {

    $columns = [];
    $columns['description'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['title'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['thumb_url'] = [
      'type' => 'char',
      'length' => 255,
    ];
    $columns['article_url'] = [
      'type' => 'char',
      'length' => 255,
    ];

    return [
      'columns' => $columns,
      'indexes' => [],
    ];
  }

  /**
   * Define when the field type is empty. 
   * 
   * This method is important and used internally by Drupal. Take a moment
   * to define when the field fype must be considered empty.
   */
  public function isEmpty() {

    $isEmpty =       
      empty($this->get('description')->getValue()) &&
      empty($this->get('title')->getValue()) &&
      empty($this->get('thumb_url')->getValue()) &&
      empty($this->get('article_url')->getValue());

    return $isEmpty;
  }

} // class



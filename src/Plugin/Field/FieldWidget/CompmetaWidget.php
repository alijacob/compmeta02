<?php

namespace Drupal\compmeta02\Plugin\Field\FieldWidget;

use Drupal;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'CompMetaDefaultWidget' widget.
 *
 * @FieldWidget(
 *   id = "CompmetaWidget",
 *   module = "compmeta02",
 *   label = @Translation("Compound Meta"),
 *   field_types = {
 *     "Compoundmeta"
 *   }
 * )
 */
class CompmetaWidget extends WidgetBase {

  /**
   * Define the form for the field type.
   * 
   * Inside this method we can define the form used to edit the field type.
   * 
   * Here there is a list of allowed element types: https://goo.gl/XVd4tA
   */
  public function formElement(
    FieldItemListInterface $items,
    $delta, 
    Array $element, 
    Array &$form, 
    FormStateInterface $formState
  ) {
    
    // Description

    $element['description'] = [
      '#type' => 'textfield',
      '#title' => t('Description'),
      '#default_value' => isset($items[$delta]->description) ? 
          $items[$delta]->description : null,
      '#empty_value' => '',
      '#placeholder' => t('Description'),
    ];

    //Title

    $element['title'] = [
      '#type' => 'textfield',
      '#title' => t('Title'),
      '#default_value' => isset($items[$delta]->title) ? 
          $items[$delta]->title : null,
      '#empty_value' => '',
      '#placeholder' => t('Title'),
    ];
    
    //Thumb Url
    
    $element['thumb_url'] = [
      '#type' => 'url',
      '#title' => t('Thumb Url'),
      '#default_value' => isset($items[$delta]->thumb_url) ? 
          $items[$delta]->thumb_url : null,
      '#empty_value' => '',
      '#placeholder' => t('Thumb Url'),
    ];
    
    //Article Url
    
    $element['article_url'] = [
      '#type' => 'url',
      '#title' => t('Article Url'),
      '#default_value' => isset($items[$delta]->article_url) ? 
          $items[$delta]->article_url : null,
      '#empty_value' => '',
      '#placeholder' => t('Article Url'),
    ];   
    
    return $element;
  }

} // class



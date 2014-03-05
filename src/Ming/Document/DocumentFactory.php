<?php
/**
 * @file
 * Contains a factory object for building Documents.
 */

namespace Ming\Document;

use Ming\Config;
use Ming\Exception\MingModelException;

/**
 * Class DocumentFactory
 *
 * @package Ming\Document
 */
class DocumentFactory {

  /**
   * config
   *
   * @var Config
   */
  protected $config;

  /**
   * Protected Constructor. Use DocumentFactory::init() instead.
   */
  protected function __construct() {

  }

  /**
   * Constructor.
   *
   * @param Config $config
   *   A Config object.
   *
   * @return \Ming\Document\DocumentFactory
   *   This document factory.
   */
  static public function init(Config $config) {

    $factory = static::instantiate();

    $factory->setConfig($config);

    return $factory;
  }

  /**
   * Create a new Document.
   *
   * @param array $data
   *   (Optional) An array of data in insert into the document.
   *
   * @return Document
   *   A Document.
   */
  public function createDocument(array $data = array()) {

    $doc = new Document($this->getConfig(), $data);

    $doc->invokeDatabaseConnection();

    return $doc;
  }

  /**
   * Set the value for Config.
   *
   * @param \Ming\Config $config
   *   The value to set.
   */
  public function setConfig(Config $config) {

    $this->config = $config;
  }

  /**
   * Get the value for Config.
   *
   * @return \Ming\Config
   *   The value of Config.
   */
  public function getConfig() {

    return $this->config;
  }

  /**
   * Protected object instantiation.
   *
   * This exists purely for IDE type hinting.
   *
   * @return DocumentFactory
   *   This Factory.
   */
  protected static function instantiate() {

    return new static();
  }

}
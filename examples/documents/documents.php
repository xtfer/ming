<?php
/**
 * @file
 * Document example.
 */

// Simply loads the Composer Autoloader.
require './../../vendor/autoload.php';

$vultan = \Vultan\Vultan::connect();

// The DocumentFactory is designed for handling dependency injection for
// Document creation.
//
// Documents can be created empty.
$document = $vultan->getDocumentFactory()->createDocument();

// Or documents can have data in them.
$my_data = array(
  'some_key' => 'apple',
  'another_key' => 'orange',
);
$document = $vultan->getDocumentFactory()->createDocument($my_data);

// Non-modelled documents must provide their collection.
$document->setCollection('fruit');

// We can perform an Upsert on the object directly.
$document->save();

// Using the same vultan object, we can do a query to see our insert.
// Note that we'll need to set the collection explicitly this time.
$vultan->useCollection('fruit');
$result = $vultan->findAll(array('some_key' => 'apple'));

print '<pre>';
print_r($result);
print '</pre>';

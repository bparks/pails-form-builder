pails-form-builder
==================

A utility that makes building a form ridiculously easy.

Dependencies
------------

None

Installation
------------

In the root of a pails app, run

    pails install form_builder

Configuration
-------------

Inside any controller where you want to make use of the form builder,
`use` the `FormBuilder` [trait][trait].

```php
class DefaultController extends Pails\Controller
{
	use PailsAuthentication;
}
```

Then, in the relevant views, you can call `$this->input_for()`

string input_for(string data_name, string label, array options)
---------------------------------------------------------------

* data_name - the `name` of the form element
* label - the text that should accompany the form element
* options - an array of options, depending on the type of element
    * type - (default: text) the type of input
    	* list - `select` list, with options
    	* textarea - a large textbox
    	* radio - a set of radio buttons, with options
    	* check - a set of checkboxes, with options
    	* number - a `number` input type (with options, multiple)
    	* text - a standard text input field
    * value - (default: empty string) the initial value of the element
    * tooltip - (default: empty string) the `title` attribute, provides
      additional information about the input
    * style - (default: empty string; textarea only) inline CSS styles
    * options - (default: array(); radio, check, list, and number only)
      an associative array of options. key is the input's `value` and
      the value is the text that should be displayed for that option
* Returns: a string of HTML built with the corresponding options

Support
-------

pails-form-builder is a core plugin supported by Synapse Software. Contact us at
support@synapsesoftware.com.

[trait]: http://php.net/manual/en/language.oop5.traits.php
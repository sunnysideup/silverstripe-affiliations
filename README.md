Affiliations
================================================================================

Developer
-----------------------------------------------
Nicolaas Francken [at] sunnysideup.co.nz

Requirements
-----------------------------------------------
see composer.json

Documentation
-----------------------------------------------
 http://silverstripe-webdevelopment.com/affiliations/

Installation Instructions
-----------------------------------------------
1. Find out how to add modules to SS and add module as per usual.
2. Review configs and add entries to mysite/_config/config.yml
(or similar) as necessary.
In the _config/ folder of this module
you can usually find some examples of config options (if any).


in page add:

	static $has_many = array(
		"Affiliations" => "Affiliation"
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab("Root.Content.Affiliation", Affiliation::get_has_many_complex_table_field($this));

-----------------------------------------------

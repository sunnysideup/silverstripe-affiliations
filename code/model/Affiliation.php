<?php

class Affiliation extends DataObject {

	static $db = array(
		"Title" => "Varchar(100)",
		"Code" => "Varchar(100)",
		"Link" => "Varchar(100)",
		"Sort" => "Int"
	);

	static $has_one = array(
		"Parent" => "SiteTree",
		"Logo" => "Image"
	);

	static function get_has_many_complex_table_field($controller, $name) {
		return new HasManyComplexTableField(
			$controller,
			$name,
			"Affiliation",
			$fieldList = self::$summary_fields,
			$detailFormFields = null,
			$sourceFilter = "ParentID = ".$controller->ID,
			$sourceSort = "Sort ASC, Title ASC",
			$sourceJoin = ""
		);
	}

	function getCode() {
		if(!$this->getField("Code")) {
			return _t('Affiliation.GETCMSAFFLIATIONIDPREFIX', 'Affiliation').$this->ID;
		}
		return $this->getField("Code");
	}

	public static $searchable_fields = array(
		"Title" => "PartialMatchFilter",
		"Code" => "PartialMatchFilter",
		"Link" => "PartialMatchFilter"
	);

	public static $summary_fields = array(
		"Title" => "Title",
		"Code" => "Code",
		"Link" => "Link"
	);

	public static $field_labels = array(
		"Sort" => "Sorting Index Number (lower numbers show first)"
	);

	public static $singular_name = "Affiliation";

	public static $plural_name = "Affiliations";
	//CRUD settings

	public static $default_sort = "Sort ASC, Title ASC";

	public static $defaults = array(
		"Sort" => 100
	);

	public function populateDefaults() {
		$this->Sort = 100;
		parent::populateDefaults();
	}

}
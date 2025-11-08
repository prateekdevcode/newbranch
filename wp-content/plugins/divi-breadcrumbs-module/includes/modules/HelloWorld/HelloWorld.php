<?php

class DCBCM_HelloWorld extends ET_Builder_Module {

	public $slug       = 'dcbcm_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divibreadcrumbs.com/',
		'author'     => 'DIVI Codex',
		'author_uri' => '',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'dcbcm-divi-breadcrumbs-module' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'dcbcm-divi-breadcrumbs-module' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dcbcm-divi-breadcrumbs-module' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new DCBCM_HelloWorld;

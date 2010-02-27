<?php
class ExtManagerTest extends SCoreWebTestCase {
	function testAuth() {
		$this->get_page('ext_manager');
		$this->assert_title("Extensions");

		$this->get_page('ext_doc');
		$this->assert_response(404);

		$this->get_page('ext_doc/ext_manager');
		$this->assert_title("Documentation for Extension Manager");
		$this->assert_text("view a list of all extensions");

		$this->log_in_as_admin();
		$this->get_page('ext_manager');
		$this->assert_title("Extensions");
		$this->assert_text("SimpleTest integration");
		$this->log_out();

		# FIXME: test that some extensions can be added and removed? :S
	}
}
?>

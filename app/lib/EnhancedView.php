<?php

class EnhancedView extends \Slim\View
{
	public function render($template, $data = null)
	{
		
		$templatePathname = $this->getTemplatePathname($template);
		if (!is_file($templatePathname)) {
			throw new \RuntimeException("View cannot render `$template` because the template does not exist");
		}

		// Layoyt
		global $layout;
		function layout($var_layout) {
			global $layout;
			$layout = $var_layout;
		}

		// Scripts
		global $scripts;
		function script($js,$id=''){
			global $scripts;
			$scripts .= '<script src="'.$js.'"';
			if(!empty($id)){
				$scripts .= ' id="asdasd"';
			}
			$scripts .= '></script>'."\n";
		}

		// StyleSheets
		global $stylesheets;
		function stylesheet($css){
			global $stylesheets;
			$stylesheets .= '<link href="'.$css.'" rel="stylesheet">'."\n";
		}

		$data = array_merge($this->data->all(), (array) $data);
		extract($data);
		
		ob_start();
		require $templatePathname;
		$body = ob_get_clean();

		if(!empty($layout)){
			$layoutPathname = $this->getTemplatePathname($layout);
			if (!is_file($layoutPathname)) {
				throw new \RuntimeException("View cannot render `$layout` because the layout does not exist");
			}

			ob_start();
			require $layoutPathname;
			return ob_get_clean();

		}else{
			return $body;
		}
	}
}
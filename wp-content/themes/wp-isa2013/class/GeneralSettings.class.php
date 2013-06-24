<?php 
class GeneralSettings {
     var $label;
     var $nome; 
     var $input_type; 
     function GeneralSettings( $label, $nome, $input_type = "text") {
         $this->label = $label;
         $this->nome = $nome;
         $this->input_type = $input_type;
         add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
     }
     function register_fields() {
         register_setting( 'general', $this->nome, 'esc_attr' );
         add_settings_field($this->nome, '<label for="'.$this->nome.'">'.__($this->label , $this->nome ).'</label>' , array(&$this, 'fields_html') , 'general' );
     }
     function fields_html() {
        $value = get_option( $this->nome, '' );
        
        if($this->input_type == "area"){
          echo '<textarea id="'.$this->nome.'" name="'.$this->nome.'" style="width:25em;height:100px">' . $value . '</textarea>';
        }else if( $this->input_type == "text" ){
          echo '<input type="text" id="'.$this->nome.'" name="'.$this->nome.'" value="' . $value . '" class="regular-text" />';
        }         
     }
}
?>
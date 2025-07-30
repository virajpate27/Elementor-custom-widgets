<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Your_Widget_Class_Name extends Widget_Base {

    public function get_name() {
        return 'your_widget_slug'; // Unique ID (used internally)
    }

    public function get_title() {
        return __( 'Your Widget Name', 'custom-elementor' ); // Display name in Elementor panel
    }

    public function get_icon() {
        return 'eicon-code'; // Icon from Elementor icon list
    }

    public function get_categories() {
        return [ 'custom-widgets' ]; // Use your category slug
    }

    protected function _register_controls() {
        $this->start_controls_section('content_section', [
            'label' => __('Content', 'custom-elementor'),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('sample_text', [
            'label'   => __('Sample Text', 'custom-elementor'),
            'type'    => Controls_Manager::TEXT,
            'default' => __('Hello Elementor!', 'custom-elementor'),
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="custom-widget" style="padding: 20px; background: #f9f9f9; border: 1px dashed #ccc;">
            <p><?= esc_html($settings['sample_text']); ?></p>
        </div>
        <?php
    }
}

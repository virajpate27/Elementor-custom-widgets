<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Elementor_Testimonial_Widget extends Widget_Base {

    public function get_name() {
        return 'testimonial_widget';
    }

    public function get_title() {
        return __( 'Testimonial Box', 'custom-elementor' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return [ 'custom-widgets' ];
    }

    protected function _register_controls() {
        $this->start_controls_section('content_section', [
            'label' => __('Content', 'custom-elementor'),
        ]);

        $this->add_control('testimonial_text', [
            'label'   => __('Testimonial', 'custom-elementor'),
            'type'    => Controls_Manager::TEXTAREA,
            'default' => __('This service is amazing!', 'custom-elementor'),
        ]);

        $this->add_control('testimonial_name', [
            'label'   => __('Name', 'custom-elementor'),
            'type'    => Controls_Manager::TEXT,
            'default' => __('John Doe', 'custom-elementor'),
        ]);

        $this->add_control('testimonial_image', [
            'label'   => __('Image', 'custom-elementor'),
            'type'    => Controls_Manager::MEDIA,
            'default' => [ 'url' => 'https://via.placeholder.com/100' ],
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div style="text-align:center; border:1px solid #ddd; padding:20px; border-radius:10px;">
            <img src="<?= esc_url($settings['testimonial_image']['url']); ?>" alt="<?= esc_attr($settings['testimonial_name']); ?>" style="width:80px;height:80px;border-radius:50%;margin-bottom:15px;" />
            <p style="font-style:italic;">"<?= esc_html($settings['testimonial_text']); ?>"</p>
            <h4><?= esc_html($settings['testimonial_name']); ?></h4>
        </div>
        <?php
    }
}

<?php
class Elementor_Testimonial_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'testimonial_box';
    }

    public function get_title() {
        return esc_html__('Testimonial Box', 'elementor-custom-widgets');
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return ['general'];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            ['label' => esc_html__('Content', 'elementor-custom-widgets')]
        );

        $this->add_control(
            'testimonial_text',
            [
                'label' => esc_html__('Testimonial', 'elementor-custom-widgets'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('This is a testimonial.', 'elementor-custom-widgets'),
            ]
        );

        $this->add_control(
            'testimonial_author',
            [
                'label' => esc_html__('Author', 'elementor-custom-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('John Doe', 'elementor-custom-widgets'),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="custom-widget">
            <p><?php echo esc_html($settings['testimonial_text']); ?></p>
            <strong>— <?php echo esc_html($settings['testimonial_author']); ?></strong>
        </div>
        <?php
    }
}

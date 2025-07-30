<?php
class Elementor_CTA_Box_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'cta_box';
    }

    public function get_title() {
        return esc_html__('CTA Box', 'elementor-custom-widgets');
    }

    public function get_icon() {
        return 'eicon-call-to-action';
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
            'cta_title',
            [
                'label' => esc_html__('Title', 'elementor-custom-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Your CTA Title', 'elementor-custom-widgets'),
            ]
        );

        $this->add_control(
            'cta_description',
            [
                'label' => esc_html__('Description', 'elementor-custom-widgets'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Your CTA description goes here.', 'elementor-custom-widgets'),
            ]
        );

        $this->add_control(
            'cta_button_text',
            [
                'label' => esc_html__('Button Text', 'elementor-custom-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'elementor-custom-widgets'),
            ]
        );

        $this->add_control(
            'cta_button_link',
            [
                'label' => esc_html__('Button Link', 'elementor-custom-widgets'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => ['url' => '#'],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="custom-widget">
            <h2><?php echo esc_html($settings['cta_title']); ?></h2>
            <p><?php echo esc_html($settings['cta_description']); ?></p>
            <a href="<?php echo esc_url($settings['cta_button_link']['url']); ?>">
                <?php echo esc_html($settings['cta_button_text']); ?>
            </a>
        </div>
        <?php
    }
}

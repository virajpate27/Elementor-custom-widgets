<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Elementor_CTA_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'cta_box';
    }

    public function get_title() {
        return __( 'CTA Box', 'custom-elementor' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return [ 'custom-widgets' ];
    }

    protected function _register_controls() {
        $this->start_controls_section('content_section', [
            'label' => __('Content', 'custom-elementor'),
        ]);

        $this->add_control('cta_title', [
            'label'   => __('Title', 'custom-elementor'),
            'type'    => Controls_Manager::TEXT,
            'default' => __('Ready to Get Started?', 'custom-elementor'),
        ]);

        $this->add_control('cta_description', [
            'label'   => __('Description', 'custom-elementor'),
            'type'    => Controls_Manager::TEXTAREA,
            'default' => __('Start building your dream website today.', 'custom-elementor'),
        ]);

        $this->add_control('cta_button_text', [
            'label'   => __('Button Text', 'custom-elementor'),
            'type'    => Controls_Manager::TEXT,
            'default' => __('Get Started', 'custom-elementor'),
        ]);

        $this->add_control('cta_button_link', [
            'label'       => __('Button Link', 'custom-elementor'),
            'type'        => Controls_Manager::URL,
            'default'     => ['url' => '#'],
        ]);

        $this->add_control('background_color', [
            'label'   => __('Background Color', 'custom-elementor'),
            'type'    => Controls_Manager::COLOR,
            'default' => '#f4f4f4',
        ]);

        $this->add_control('padding', [
            'label'   => __('Padding (px)', 'custom-elementor'),
            'type'    => Controls_Manager::NUMBER,
            'default' => 30,
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div style="background: <?= esc_attr($settings['background_color']); ?>; padding: <?= esc_attr($settings['padding']); ?>px; text-align:center; border-radius:8px;">
            <h2><?= esc_html($settings['cta_title']); ?></h2>
            <p><?= esc_html($settings['cta_description']); ?></p>
            <a href="<?= esc_url($settings['cta_button_link']['url']); ?>" style="background:#000;color:#fff;padding:10px 25px;border-radius:4px;text-decoration:none;">
                <?= esc_html($settings['cta_button_text']); ?>
            </a>
        </div>
        <?php
    }
}

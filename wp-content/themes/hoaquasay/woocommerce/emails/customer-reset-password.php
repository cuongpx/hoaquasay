<?php
/**
 * Customer Reset Password email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading ); ?>

<p><?php _e( 'Có người yêu cầu các mật khẩu được thiết lập lại cho các tài khoản sau đây:', 'woocommerce' ); ?></p>
<p><?php printf( __( 'Username: %s', 'woocommerce' ), $user_login ); ?></p>
<p><?php _e( 'Nếu đây là một lầm lẫn, chỉ cần bỏ qua email này và không có gì sẽ xảy ra.', 'woocommerce' ); ?></p>
<p><?php _e( 'Để thiết lập lại mật khẩu của bạn, hãy truy cập vào địa chỉ sau đây:', 'woocommerce' ); ?></p>
<p>
    <a class="link" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>">
			<?php _e( 'Nhấn vào đây để thiết lập lại mật khẩu của bạn', 'woocommerce' ); ?></a>
</p>
<p></p>

<?php do_action( 'woocommerce_email_footer' ); ?>

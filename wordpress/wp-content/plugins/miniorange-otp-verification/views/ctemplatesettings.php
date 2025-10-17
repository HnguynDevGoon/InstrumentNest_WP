<?php
/**
 * Loads View for List of all the addons.
 *
 * @package miniorange-otp-verification
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use OTP\Helper\MoUtility;
use OTP\Helper\MoMessages;
echo '
			<div class="border-b flex flex-col gap-mo-6 px-mo-4" id="mo-sms-configuration">
				<div class="w-full flex m-mo-4">
					<div class="flex-1">
						<h5 class="mo-title">' . esc_html( $sms_title ) . '</h5>
						<p class="mo-caption mt-mo-2">' . esc_html( mo_( 'Personalize your SMS template according to your preferences and specific needs.' ) ) . '</p>
						<span class="py-mo-4 text-mo-lg text-left" style="display:block;"><b>' . esc_html( MoMessages::showMessage( MoMessages::DLT_TEMPLATE_TITLE ) ) . '</b></span>';
echo '                  	<span class="body">' . wp_kses( MoMessages::showMessage( MoMessages::DLT_TEMPLATE_BODY ), MoUtility::mo_allow_html_array() ) . '</span>			
					</div>
					<div class="flex-1">
						<div id="sms" class="w-[95%] pt-mo-4 pr-mo-4">
							<div class="mo-input-wrapper">
								<label class="mo-input-label">' . esc_attr( mo_( $sms_msg ) ) . '</label>
								<textarea ' . esc_attr( $disabled ) . ' name="mo_customer_validation_custom_sms_msg" id="custom_sms_msg" placeholder="' . esc_attr( $sms_msg_placeholder ) . '" rows="4" maxlength="400" class="mo-textarea mo_remaining_characters" >' . esc_attr( $sms_template ) . '</textarea>
							</div>
						</div>
						<p class="mo-caption mo_otp_note mr-mo-10">
							' . esc_html( $sms_msg_note ) . '
						</p>
					</div>
				</div>';

echo '							
			</div>

			<div class="border-b flex flex-col gap-mo-6 px-mo-4">
				<div class="w-full flex m-mo-4">
					<div class="flex-1">
						<h5 class="mo-title">' . esc_html( $email_title ) . '</h5>
						<p class="mo-caption mt-mo-2 mr-mo-8">' . esc_html( $email_note ) . '</p>';
if ( ! $smtp_type ) {
	echo '				<p class="mt-mo-4 pr-mo-8" style="font-size:11px;" >
							' . wp_kses( mo_( "<b>Note</b>: You can configure your SMTP gateway from any third party SMTP plugin( For e.g <u><i><a href='https://wordpress.org/plugins/wp-mail-smtp/' target='_blank' >WP SMTP</a></i></u> ) or php.ini file.<br><b>You don't need to configure any extra settings in our plugin.</b>" ), MoUtility::mo_allow_html_array() ) . '
						</p>';
}
	echo '			</div>';

	echo '			<div class="flex-1 pr-mo-4 pl-mo-2 pb-mo-4" id="email">
						<div class="flex-1 flex my-mo-8 gap-mo-4">
							<div class="mo-input-wrapper">
								<label class="mo-input-label">' . esc_html( $from_id ) . '</label>
								<input  ' . esc_attr( $disabled ) . esc_attr( $smtp_disabled ) . ' class=" mo-input" id="custom_email_from_id" placeholder="' . esc_attr( $mail_frm_addr ) . '" value="' . esc_attr( $email_from_id ) . '" type="text" name="mo_customer_validation_custom_email_from_id" >
							</div>
							<div class="mo-input-wrapper">
								<label class="mo-input-label">' . esc_html( $from_name ) . '</label>
								<input  ' . esc_attr( $disabled ) . ' class=" mo-input mr-mo-6" id="custom_email_from_name" placeholder="' . esc_attr( $mail_frm_pholder ) . '" value="' . esc_attr( $email_from_name ) . '" type="text" name="mo_customer_validation_custom_email_from_name" >
							</div>
						</div>
						<div class="mo-input-wrapper">
							<label class="mo-input-label">' . esc_html( $subject ) . '</label>
							<input  ' . esc_attr( $disabled ) . ' class="w-[95%] mo-input" id="custom_email_subject" placeholder="' . esc_attr( $mail_sub_pholder ) . '" value="' . esc_attr( $email_subject ) . '" type="text" name="mo_customer_validation_custom_email_subject" >
						</div>';

							wp_editor( $content, $editor_id, $template_settings );

	echo '						
					</div>';

echo '				</div>
			</div>';

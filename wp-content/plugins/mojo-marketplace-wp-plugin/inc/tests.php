<?php
function mm_ab_test_inclusion( $test_name, $key, $audience, $duration ) {
	if( false === ( $test = get_transient( 'mm_test', false ) ) ) {
		$previous_tests = get_option( 'mm_previous_tests', array() );

		if ( in_array( $test_name, $previous_tests ) ) { return false; }

		$score = mt_rand( 0, 99 );

		if ( $audience > $score ) {
			set_transient( 'mm_test', array( 'name' => $test_name, 'key' => $key ), $duration );
			$previous_tests[] = $test_name;
			update_option( 'mm_previous_tests', $previous_tests );
			return true;
		}
	} else if ( $test['key'] === $key ) {
		return true;
	}
	return false;
}

function mm_ab_test_inclusion_none() {
	if ( is_admin() && false === get_transient( 'mm_test', false ) ) {
		$duration = WEEK_IN_SECONDS * 4;
		set_transient( 'mm_test', array( 'key' => 'none' ), $duration );
	}
}
add_action( 'admin_footer', 'mm_ab_test_inclusion_none', 99 );

function mm_ab_test_file( $test_name, $file, $original, $test, $audience = 10, $duration = WEEK_IN_SECONDS  ) {
	if ( strpos( $file, $original ) ) {
		$key = md5( serialize( $test ) );
		$inclusion = mm_ab_test_inclusion( $test_name, $key, $audience, $duration );

		$test_file = str_replace( $original, $test, $file );

		if( $inclusion && file_exists( $test_file ) ) {
			$file = $test_file;
		}
	}
	return $file;
}

function mm_ab_test_content( $test_name, $original, $test, $audience = 10, $duration = WEEK_IN_SECONDS ) {
	$key = md5( serialize( $test ) );
	if ( mm_ab_test_inclusion( $test_name, $key, $audience, $duration ) ) {
		return $test;
	}
	return $original;
}

/* Few example tests

function mm_themes_ab( $file ) {
	return mm_ab_test_file( 'themes_page', $file, 'pages/mojo-themes.php', 'tests/mojo-themes.php' );
}
add_filter( 'mm_require_file', 'mm_themes_ab' );

function mm_themes_categories( $accepted_categories ) {
	$test_categories = array(
		'recent',
		'popular',
		'responsive',
		'business',
		'ecommerce',
		'photography',
		'real-estate',
		'restaurant'
	);
	return mm_ab_test_content( 'themes_categories_recent_first', $accepted_categories, $test_categories, 10 );
}
add_filter( 'mm_themes_accepted_categories', 'mm_themes_categories' );
*/

/* Start individual tests*/

/**
 * Should Jetpack Start perform well, we would move this stuff to inc/jetpack.php.
 */

function mm_jetpack_bluehost_only() {
	$host = @exec( 'hostname' );
	$is_bluehost = ( stripos( $host, 'bluehost' ) ) ? true : false;
	return $is_bluehost;
}

function mm_jetpack_onboarding_test() {
	$file = MM_BASE_DIR . 'tests/jetpack-onboarding/jetpack-onboarding.php';
	if ( file_exists( $file ) && mm_jetpack_bluehost_only() ) {
		if ( ! mm_ab_test_inclusion( 'jetpack-onboarding-v1', md5( 'jetpack-onboarding-v1' ), 30, WEEK_IN_SECONDS * 4 ) ) {
			mm_ab_test_inclusion( 'jetpack-onboarding-exempt-v1', md5( 'jetpack-onboarding-exempt-v1' ), 43, WEEK_IN_SECONDS * 4 );
			add_option( 'jpstart_wizard_has_run', true );
		} else {
			/*
			This is to avoid the issue with WC dismissing the welcome screen
			*/
			if ( false == get_option( 'mm_wc_screen_hack' ) ) {
				update_user_meta( get_current_user_id(), 'show_welcome_panel', 1 );
			}
			mm_require( $file );
			mm_require( MM_BASE_DIR . 'tests/jetpack-onboarding-tracks/jetpack-onboarding-tracks.php' );
		}
	}
}
add_action( 'init', 'mm_jetpack_onboarding_test', 5 );

function mm_wc_hack( $null, $object_id, $meta_key, $meta_value ) {
	if ( 'show_welcome_panel' == $meta_key && 0 == $meta_value ) {
		update_option( 'mm_wc_screen_hack', true );
	}
	return null;
}
add_filter( 'updated_user_metadata', 'mm_wc_hack', 10, 4 );

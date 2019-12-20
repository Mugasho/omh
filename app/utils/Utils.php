<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/16/2019
 * Time: 7:28 PM
 */

namespace omh\utils;

class Utils {
	public $countries;

	/**
	 * Utils constructor.
	 */
	public function __construct() {
		$this->countries = $this->get_countries();
	}

	function get_countries() {
		/*
		 * @param none
		 * @return array
		 */
		return array(
			'AF' => 'Afghanistan',
			'AX' => '&#197;land Islands',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'PW' => 'Belau',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BQ' => 'Bonaire, Saint Eustatius and Saba',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory',
			'VG' => 'British Virgin Islands',
			'BN' => 'Brunei',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos (Keeling) Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CG' => 'Congo (Brazzaville)',
			'CD' => 'Congo (Kinshasa)',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CW' => 'Cura&ccedil;ao',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FK' => 'Falkland Islands',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard Island and McDonald Islands',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Republic of Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'CI' => 'Ivory Coast',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
			'LA' => 'Laos',
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macao S.A.R., China',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'FM' => 'Micronesia',
			'MD' => 'Moldova',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'AN' => 'Netherlands Antilles',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'MP' => 'Northern Mariana Islands',
			'KP' => 'North Korea',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PK' => 'Pakistan',
			'PS' => 'Palestinian Territory',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'RE' => 'Reunion',
			'RO' => 'Romania',
			'RU' => 'Russia',
			'RW' => 'Rwanda',
			'BL' => 'Saint Barth&eacute;lemy',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'MF' => 'Saint Martin (French part)',
			'SX' => 'Saint Martin (Dutch part)',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'SM' => 'San Marino',
			'ST' => 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SK' => 'Slovakia',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia/Sandwich Islands',
			'KR' => 'South Korea',
			'SS' => 'South Sudan',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard and Jan Mayen',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
			'SY' => 'Syria',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom (UK)',
			'US' => 'United States (US)',
			'UM' => 'United States (US) Minor Outlying Islands',
			'VI' => 'United States (US) Virgin Islands',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VA' => 'Vatican',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
			'WS' => 'Samoa',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe'
		);
	}

	function get_districts() {
		return array(
			"abim"          => "Abim",
			"adjumani"      => "Adjumani",
			"agago"         => "Agago",
			"alebtong"      => "Alebtong",
			"amolatar"      => "Amolatar",
			"amudat"        => "Amudat",
			"amuria"        => "Amuria",
			"amuru"         => "Amuru",
			"apac"          => "Apac",
			"arua"          => "Arua",
			"budaka"        => "Budaka",
			"bududa"        => "Bududa",
			"bugiri"        => "Bugiri",
			"buikwe"        => "Buikwe",
			"bukedea"       => "Bukedea",
			"bukomansimbi"  => "Bukomansimbi",
			"bukwo"         => "Bukwo",
			"bulambuli"     => "Bulambuli",
			"buliisa"       => "Buliisa",
			"bundibugyo"    => "Bundibugyo",
			"bushenyi"      => "Bushenyi",
			"busia"         => "Busia",
			"butaleja"      => "Butaleja",
			"butambala"     => "Butambala",
			"buvuma"        => "Buvuma",
			"buyende"       => "Buyende",
			"dokolo"        => "Dokolo",
			"gomba"         => "Gomba",
			"gulu"          => "Gulu",
			"hoima"         => "Hoima",
			"ibanda"        => "Ibanda",
			"iganga"        => "Iganga",
			"isingiro"      => "Isingiro",
			"jinja"         => "Jinja",
			"kaabong"       => "Kaabong",
			"kabale"        => "Kabale",
			"kabarole"      => "Kabarole",
			"kaberamaido"   => "Kaberamaido",
			"kalangala"     => "Kalangala",
			"kaliro"        => "Kaliro",
			"kalungu"       => "Kalungu",
			"kampala"       => "Kampala",
			"kamuli"        => "Kamuli",
			"kamwenge"      => "Kamwenge",
			"kanungu"       => "Kanungu",
			"kapchorwa"     => "Kapchorwa",
			"kasese"        => "Kasese",
			"katakwi"       => "Katakwi",
			"katerere"      => "Katerere",
			"kayunga"       => "Kayunga",
			"kibaale"       => "Kibaale",
			"kibingo"       => "Kibingo",
			"kiboga"        => "Kiboga",
			"kibuku"        => "Kibuku",
			"kiruhura"      => "Kiruhura",
			"kiryandongo"   => "Kiryandongo",
			"kisoro"        => "Kisoro",
			"kitgum"        => "Kitgum",
			"koboko"        => "Koboko",
			"kole"          => "Kole",
			"kotido"        => "Kotido",
			"kumi"          => "Kumi",
			"kween"         => "Kween",
			"kyankwanzi"    => "Kyankwanzi",
			"kyegegwa"      => "Kyegegwa",
			"kyenjojo"      => "Kyenjojo",
			"lamwo"         => "Lamwo",
			"lira"          => "Lira",
			"luuka"         => "Luuka",
			"luwero"        => "Luwero",
			"lwengo"        => "Lwengo",
			"lyantonde"     => "Lyantonde",
			"manafwa"       => "Manafwa",
			"maracha"       => "Maracha",
			"masaka"        => "Masaka",
			"masindi"       => "Masindi",
			"mayuge"        => "Mayuge",
			"mbale"         => "Mbale",
			"mbarara"       => "Mbarara",
			"mitooma"       => "Mitooma",
			"mityana"       => "Mityana",
			"moroto"        => "Moroto",
			"moyo"          => "Moyo",
			"mpigi"         => "Mpigi",
			"mubende"       => "Mubende",
			"mukono"        => "Mukono",
			"nakapiripirit" => "Nakapiripirit",
			"nakaseke"      => "Nakaseke",
			"nakasongola"   => "Nakasongola",
			"namiyango"     => "Namiyango",
			"namutumba"     => "Namutumba",
			"napak"         => "Napak",
			"nebbi"         => "Nebbi",
			"ngora"         => "Ngora",
			"nsiika"        => "Nsiika",
			"ntoroko"       => "Ntoroko",
			"ntungamo"      => "Ntungamo",
			"nwoya"         => "Nwoya",
			"otuke"         => "Otuke",
			"oyam"          => "Oyam",
			"pader"         => "Pader",
			"pallisa"       => "Pallisa",
			"rakai"         => "Rakai",
			"rukungiri"     => "Rukungiri",
			"serere"        => "Serere",
			"sironko"       => "Sironko",
			"soroti"        => "Soroti",
			"ssembabule"    => "Ssembabule",
			"tororo"        => "Tororo",
			"wakiso"        => "Wakiso",
			"yumbe"         => "Yumbe",
			"zombo"         => "Zombo"
		);
	}

	function get_gender() {
		/*
        * @param none
        * @return array
        */
		return array(
			'M' => 'Male',
			'F' => 'Female'
		);
	}

	function get_fee_action() {
		/*
        * @param none
        * @return array
        */
		return array(
			'0' => 'Deposit',
			'1' => 'Withdraw'
		);
	}

	function get_asset_category() {
		/*
        * @param none
        * @return array
        */
		return array(
			'current'    => 'Current',
			'fixed'      => 'Fixed',
			'intangible' => 'Intangible',
			'investment' => 'Investment',
			'other'      => 'Other'
		);
	}

	function get_recur_types() {
		/*
        * @param none
        * @return array
        */
		return array(
			'1'   => 'After Meal',
			'2'  => 'Before Meal',
			'3' => 'Morning',
			'4'  => 'Night'

		);
	}

	function get_prescription_period() {
		/*
        * @param none
        * @return array
        */
		return array(
			'day'   => 'Day(s)',
			'week'  => 'Week(s)',
			'month' => 'Month(s)',
			'year'  => 'Year(s)'

		);
	}
	function get_bool() {
		/*
        * @param none
        * @return array
        */
		return array(
			'1'   => 'Yes',
			'0'  => 'No'
		);
	}

    function get_icon_colors() {
        /*
        * @param none
        * @return array
        */
        return array(
            'indigo-400'  => 'indigo-400',
            'success-400' => 'success-400',
            'primary-400'  => 'primary-400',
            'warning-400'  => 'warning-400',
            'danger-400'  => 'danger-400'

        );
    }

	function get_extension( $filename ) {
		return strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) );
	}

	function get_icon( $extension ) {
		switch ( $extension ) {
			case 'jpg':
			case 'png':
			case 'gif':
				return 'icon-file-picture text-primary-300';
			case 'xls':
			case 'xlsx':
			case 'csv':
				return 'icon-file-excel text-success-300';
			case 'ppt':
			case 'pptx':
				return 'icon-file-presentation text-warning-300';
			case 'doc':
			case 'docx':
			case 'rtf':
				return 'icon-file-word text-primary-300';
			case 'pdf':
				return 'icon-file-pdf text-warning-300';
			default:
				return 'icon-file-text2 text-primary-300';
		}
	}

	function get_image_icon( $filename, $width = 60, $classes = '' ) {
		switch ( $this->get_extension( $filename ) ) {
			case 'jpg':
			case 'png':
			case 'gif':
				$image = '<img src="' . $filename . '" alt="" class="' . $classes . '" width="' . $width . '">';
				break;
			case 'pdf':
				$image = '<i class="icon-file-pdf icon-2x text-warning-300"></i>';
				break;
			case 'xls':
			case 'xlsx':
				$image = '<i class="icon-file-spreadsheet icon-2x text-success-300"></i>';
				break;
			case 'ppt':
			case 'pptx':
				$image = '<i class="icon-file-presentation icon-2x text-warning-300"></i>';
				break;
			case 'rtf':
			case 'doc':
			case 'docx':
				$image = '<i class="icon-file-word icon-2x text-primary-300"></i>';
				break;
			default:
				$image = '<i class="icon-file-text icon-2x text-primary-300"></i>';

		}

		return $image;
	}

	function formatBytes( $bytes, $precision = 2 ) {
		$units = array( 'B', 'KB', 'MB', 'GB', 'TB' );

		$bytes = max( $bytes, 0 );
		$pow   = floor( ( $bytes ? log( $bytes ) : 0 ) / log( 1024 ) );
		$pow   = min( $pow, count( $units ) - 1 );

		// Uncomment one of the following alternatives
		$bytes /= pow( 1024, $pow );

		// $bytes /= (1 << (10 * $pow));

		return round( $bytes, $precision ) . ' ' . $units[ $pow ];
	}

	function get_interval( $old_date ) {
		$interval = date_diff( date_create(), date_create( $old_date ) );

		if ( $interval->y > 0 ) {
			return $interval->format( "%y yrs" );
		}
		if ( $interval->y < 1 && $interval->m > 0 ) {
			return $interval->format( "%m Months" );
		}
		if ( $interval->y < 1 && $interval->m < 1 && $interval->d > 0 ) {
			return $interval->format( "%d Days" );
		}
		if ( $interval->y < 1 && $interval->m < 1 && $interval->d < 1 && $interval->h > 0 ) {

			return $interval->format( "%h Hours" );
		}
	}

	/**
	 * Reduce word length
	 *
	 * @param $text
	 * @param $maxChar
	 * @param string $end
	 *
	 * @return string
	 */
	function limitChars( $text, $maxChar, $end = '...' ) {
		$output = '';
		if ( ! empty( $text ) ) {
			if ( strlen( $text ) > $maxChar || $text == '' ) {
				$words  = preg_split( '/\s/', $text );
				$output = '';
				$i      = 0;
				while ( 1 ) {
					$length = strlen( $output ) + strlen( $words[ $i ] );
					if ( $length > $maxChar ) {
						break;
					} else {
						$output .= " " . $words[ $i ];
						++ $i;
					}
				}
				$output .= $end;
			} else {
				$output = $text;
			}
		}

		return $output;
	}

}
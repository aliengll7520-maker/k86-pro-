/**
 * --------------------------------------------------------
 * K86 Pro
 * Engagement Engine
 * Version: 1.0.0
 * --------------------------------------------------------
 */

(function ($) {

	'use strict';

	window.K86Engagement = window.K86Engagement || {};

	K86Engagement.version = '1.0.0';

	K86Engagement.init = function () {

		this.bindReactions();

		this.bindShare();

		this.bindCopy();

		console.log('K86 Engagement Engine Loaded');

	};

	/*
	|--------------------------------------------------------------------------
	| Reaction
	|--------------------------------------------------------------------------
	*/

	K86Engagement.bindReactions = function () {

		$(document).on(
			'click',
			'.k86-reaction-button',
			function (e) {

				e.preventDefault();

				const button = $(this);

				const reaction = button.data('reaction');

				$('.k86-reaction-button')
					.removeClass('is-active');

				button.addClass('is-active');

				K86Engagement.sendReaction(
					reaction
				);

			}
		);

	};

	K86Engagement.sendReaction = function (reaction) {

    K86Engagement.ajax(
        'k86_save_reaction',
        {
            reaction: reaction
        }
    )
    .done(function (response) {

        console.log(response);

        if (response.success) {

            // Bước tiếp theo sẽ cập nhật số liệu trên giao diện.

        } else {

            alert('Không lưu được Reaction.');

        }

    })
    .fail(function (xhr) {

        console.error(xhr);

        alert('Lỗi kết nối tới máy chủ.');

    });

};
		/*
	|--------------------------------------------------------------------------
	| Share
	|--------------------------------------------------------------------------
	*/

	K86Engagement.bindShare = function () {

		$(document).on(
			'click',
			'.k86-share-button',
			function (e) {

				e.preventDefault();

				const platform = $(this).data('platform');

				K86Engagement.share(platform);

			}
		);

	};

	K86Engagement.share = function (platform) {

		const url = encodeURIComponent(
			window.location.href
		);

		switch ( platform ) {

			case 'facebook':

				window.open(
					'https://www.facebook.com/sharer/sharer.php?u=' + url,
					'_blank'
				);

				break;

			case 'x':

				window.open(
					'https://twitter.com/intent/tweet?url=' + url,
					'_blank'
				);

				break;

			case 'telegram':

				window.open(
					'https://t.me/share/url?url=' + url,
					'_blank'
				);

				break;

			default:

				if ( navigator.share ) {

					navigator.share({

						url: window.location.href

					});

				}

		}

	};

	/*
	|--------------------------------------------------------------------------
	| AJAX Framework
	|--------------------------------------------------------------------------
	*/

	K86Engagement.ajax = function ( action, data ) {

		if (
			typeof k86_ajax === 'undefined'
		) {
			return;
		}

		return $.ajax({

			url: k86_ajax.ajax_url,

			type: 'POST',

			data: $.extend({

				action: action,

				nonce: k86_ajax.nonce

			}, data )

		});

	};

	/*
	|--------------------------------------------------------------------------
	| Boot Engine
	|--------------------------------------------------------------------------
	*/

	$(function () {

		K86Engagement.init();

	});

})(jQuery);

	/*
	|--------------------------------------------------------------------------
	| Copy Link
	|--------------------------------------------------------------------------
	*/

	K86Engagement.bindCopy = function () {

		$(document).on(
			'click',
			'.k86-copy-button',
			function (e) {

				e.preventDefault();

				K86Engagement.copyLink();

			}
		);

	};

	K86Engagement.copyLink = function () {

		const url = window.location.href;

		if (
			navigator.clipboard &&
			navigator.clipboard.writeText
		) {

			navigator.clipboard.writeText(url);

			alert('Đã sao chép liên kết.');

			return;

		}

		const input = document.createElement('input');

		input.value = url;

		document.body.appendChild(input);

		input.select();

		document.execCommand('copy');

		document.body.removeChild(input);

		alert('Đã sao chép liên kết.');

	};

<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="k86-admin-section">

	<h2><?php esc_html_e( 'Media', 'k86-pro' ); ?></h2>

	<table class="form-table">

		<tr>
			<th>
				<label for="k86_image">
					<?php esc_html_e( 'Ảnh đại diện', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<input
					type="text"
					id="k86_image"
					name="k86_image"
					class="regular-text"
					value="<?php echo esc_attr( $product['image'] ?? '' ); ?>">

				<p class="description">
					URL ảnh đại diện sản phẩm.
				</p>
			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_gallery">
					<?php esc_html_e( 'Gallery', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<textarea
					id="k86_gallery"
					name="k86_gallery"
					rows="4"
					class="large-text"><?php echo esc_textarea( $product['gallery'] ?? '' ); ?></textarea>

				<p class="description">
					Mỗi URL một dòng.
				</p>
			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_video">
					<?php esc_html_e( 'Video', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<input
					type="text"
					id="k86_video"
					name="k86_video"
					class="regular-text"
					value="<?php echo esc_attr( $product['video'] ?? '' ); ?>">

				<p class="description">
					URL video trực tiếp (MP4...).
				</p>
			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_youtube">
					<?php esc_html_e( 'YouTube', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<input
					type="text"
					id="k86_youtube"
					name="k86_youtube"
					class="regular-text"
					value="<?php echo esc_attr( $product['youtube'] ?? '' ); ?>">

				<p class="description">
					URL video YouTube.
				</p>
			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_tiktok">
					<?php esc_html_e( 'TikTok', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<input
					type="text"
					id="k86_tiktok"
					name="k86_tiktok"
					class="regular-text"
					value="<?php echo esc_attr( $product['tiktok'] ?? '' ); ?>">

				<p class="description">
					URL video TikTok.
				</p>
			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_pdf">
					<?php esc_html_e( 'PDF', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<input
					type="text"
					id="k86_pdf"
					name="k86_pdf"
					class="regular-text"
					value="<?php echo esc_attr( $product['pdf'] ?? '' ); ?>">

				<p class="description">
					URL file PDF.
				</p>
			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_documents">
					<?php esc_html_e( 'Documents', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<textarea
					id="k86_documents"
					name="k86_documents"
					rows="3"
					class="large-text"><?php echo esc_textarea( $product['documents'] ?? '' ); ?></textarea>

				<p class="description">
					Mỗi URL tài liệu một dòng.
				</p>
			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_audio">
					<?php esc_html_e( 'Audio', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<textarea
					id="k86_audio"
					name="k86_audio"
					rows="3"
					class="large-text"><?php echo esc_textarea( $product['audio'] ?? '' ); ?></textarea>

				<p class="description">
					Mỗi URL audio một dòng.
				</p>
			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_icon">
					<?php esc_html_e( 'Icon', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<input
					type="text"
					id="k86_icon"
					name="k86_icon"
					class="regular-text"
					value="<?php echo esc_attr( $product['icon'] ?? '' ); ?>">

				<p class="description">
					URL icon.
				</p>
			</td>
		</tr>

		<tr>
			<th>
				<label for="k86_downloads">
					<?php esc_html_e( 'Downloads', 'k86-pro' ); ?>
				</label>
			</th>
			<td>
				<textarea
					id="k86_downloads"
					name="k86_downloads"
					rows="3"
					class="large-text"><?php echo esc_textarea( $product['downloads'] ?? '' ); ?></textarea>

				<p class="description">
					Mỗi URL tải xuống một dòng.
				</p>
			</td>
		</tr>

	</table>

</div>

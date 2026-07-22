		/**
		 * Save product.
		 *
		 * @param array $product Product data.
		 * @return bool
		 */
		public function save( array $product ) {

			$wpdb = $GLOBALS['wpdb'];

			$product = $this->prepare_data( $product );

			if ( empty( $product ) ) {
				return false;
			}

			$result = $wpdb->insert(
				$this->table(),
				$product
			);

			if ( false === $result ) {
				return false;
			}

			return true;

		}

		/**
		 * Update product.
		 *
		 * @param int   $id Product ID.
		 * @param array $product Product data.
		 * @return bool
		 */
		public function update( $id, array $product ) {

			$wpdb = $GLOBALS['wpdb'];

			$id = absint( $id );

			if ( $id <= 0 ) {
				return false;
			}

			$product = $this->prepare_data( $product );

			if ( empty( $product ) ) {
				return false;
			}

			$result = $wpdb->update(
				$this->table(),
				$product,
				array(
					$this->primary_key() => $id,
				)
			);

			return false !== $result;

				}
		/**
		 * Delete product.
		 *
		 * @param int $id Product ID.
		 * @return bool
		 */
		public function delete( $id ) {

			$wpdb = $GLOBALS['wpdb'];

			$id = absint( $id );

			if ( $id <= 0 ) {
				return false;
			}

			$result = $wpdb->delete(
				$this->table(),
				array(
					$this->primary_key() => $id,
				),
				array( '%d' )
			);

			return false !== $result;

		}

		/**
		 * Find product by ID.
		 *
		 * @param int $id Product ID.
		 * @return array
		 */
		public function find( $id ) {

			$wpdb = $GLOBALS['wpdb'];

			$id = absint( $id );

			if ( $id <= 0 ) {
				return array();
			}

			$sql = $wpdb->prepare(
				"SELECT * FROM {$this->table()} WHERE {$this->primary_key()} = %d LIMIT 1",
				$id
			);

			$product = $wpdb->get_row( $sql, ARRAY_A );

			if ( empty( $product ) ) {
				return array();
			}

			return $product;

		}
		/**
		 * Get all products.
		 *
		 * @param array $args Query arguments.
		 * @return array
		 */
		public function find_all( array $args = array() ) {

			$wpdb = $this->wpdb();

			$defaults = array(
				'orderby' => $this->primary_key(),
				'order'   => 'DESC',
				'limit'   => 0,
				'offset'  => 0,
			);

			$args = wp_parse_args( $args, $defaults );

			$sql = "SELECT * FROM {$this->table()}";

			$sql .= " ORDER BY {$args['orderby']} {$args['order']}";

			if ( ! empty( $args['limit'] ) ) {

				$sql .= $wpdb->prepare(
					' LIMIT %d OFFSET %d',
					absint( $args['limit'] ),
					absint( $args['offset'] )
				);

			}

			return $wpdb->get_results( $sql, ARRAY_A );

		}

		/**
		 * Count products.
		 *
		 * @return int
		 */
		public function count() {

			$wpdb = $this->wpdb();

			$sql = "SELECT COUNT(*) FROM {$this->table()}";

			return (int) $wpdb->get_var( $sql );

		}

		/**
		 * Check product exists.
		 *
		 * @param int $id Product ID.
		 * @return bool
		 */
		public function exists( $id ) {

			return ! empty( $this->find( $id ) );

		}
		/**
		 * Get paginated products.
		 *
		 * @param int $page     Current page.
		 * @param int $per_page Items per page.
		 * @return array
		 */
		public function paginate( $page = 1, $per_page = 20 ) {

			$page     = max( 1, absint( $page ) );
			$per_page = max( 1, absint( $per_page ) );
			$offset   = ( $page - 1 ) * $per_page;

			return $this->find_all(
				array(
					'limit'  => $per_page,
					'offset' => $offset,
				)
			);

		}

		/**
		 * Search products.
		 *
		 * @param string $keyword Search keyword.
		 * @param int    $limit   Limit results.
		 * @return array
		 */
		public function search( $keyword, $limit = 20 ) {

			$wpdb = $this->wpdb();

			$keyword = trim( wp_unslash( $keyword ) );

			if ( '' === $keyword ) {
				return array();
			}

			$limit = max( 1, absint( $limit ) );

			$like = '%' . $wpdb->esc_like( $keyword ) . '%';

			$sql = $wpdb->prepare(
				"SELECT * FROM {$this->table()}
				WHERE title LIKE %s
				   OR slug LIKE %s
				   OR sku LIKE %s
				ORDER BY {$this->primary_key()} DESC
				LIMIT %d",
				$like,
				$like,
				$like,
				$limit
			);

			return $wpdb->get_results( $sql, ARRAY_A );

		}
		/**
		 * Sanitize product data.
		 *
		 * @param array $product Product data.
		 * @return array
		 */
		protected function sanitize( array $product ) {

			$data = array();

			foreach ( $this->columns() as $column ) {

				if ( ! array_key_exists( $column, $product ) ) {
					continue;
				}

				$value = $product[ $column ];

				if ( is_array( $value ) ) {
					$data[ $column ] = wp_json_encode( $value );
				} else {
					$data[ $column ] = sanitize_text_field( wp_unslash( $value ) );
				}

			}

			return $data;

		}

		/**
		 * Validate product data.
		 *
		 * @param array $product Product data.
		 * @return bool
		 */
		protected function validate( array $product ) {

			if ( empty( $product['title'] ) ) {
				return false;
			}

			return true;

		}

		/**
		 * Prepare product data.
		 *
		 * @param array $product Product data.
		 * @return array
		 */
		protected function prepare_data( array $product ) {

			$product = $this->sanitize( $product );

			if ( ! $this->validate( $product ) ) {
				return array();
			}

			return $product;

		}
		/**
		 * Get last inserted ID.
		 *
		 * @return int
		 */
		public function insert_id() {

			$wpdb = $this->wpdb();

			return (int) $wpdb->insert_id;

		}

		/**
		 * Check repository health.
		 *
		 * @return bool
		 */
		public function is_ready() {

			return ! empty( $this->table() )
				&& ! empty( $this->columns() );

		}

	} // End class.

}

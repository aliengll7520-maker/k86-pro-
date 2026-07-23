<?php
/**
 * K86 Pro Next Core
 * Product Repository
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Repository' ) ) {

	class K86_Product_Repository {
		/**
 * Storage.
 *
 * @var K86_Product_Storage_Interface
 */
protected $storage;
		public function __construct(
	K86_Product_Storage_Interface $storage = null
) {

	$this->storage = $storage
		? $storage
		: new K86_Product_Database_Storage();

		}

		public function find( $id ) {

	return $this->storage->find( $id );

		}

		public function find_by_slug( $slug ) {

	return $this->storage->find_by_slug( $slug );

		}

		public function find_by_sku( $sku ) {

	return $this->storage->find_by_sku( $sku );

		}

		public function exists( $id ) {

			return $this->find( $id )->get( 'id' ) > 0;
		}

		public function all() {

	return $this->storage->all();

		}

		public function paginate( $page = 1, $per_page = 20 ) {

	return $this->storage->paginate( $page, $per_page );

		}


		public function save( K86_Product_Model $product ) {

	return $this->storage->save( $product );

		}

		public function delete( $id ) {

	return $this->storage->delete( $id );

		}
	}

}

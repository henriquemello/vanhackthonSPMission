<?php

namespace ProposiDocs\Proposal\Storage;

use ProposiDocs\Proposal\Storage\InMemory\ProposalStorageInMemory;

class ProposalStorageService {

	private static $instance;

	public static function resolve(): ProposalStorage {
		return self::$instance ?? self::$instance = new ProposalStorageInMemory();
	}
}

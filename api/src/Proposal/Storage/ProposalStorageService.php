<?php

namespace ProposiDocs\Proposal\Storage;

use ProposiDocs\Proposal\Storage\AWS\ProposalStorageAWS;

class ProposalStorageService {

	private static $instance;

	public static function resolve(): ProposalStorage {
		return self::$instance ?? self::$instance = new ProposalStorageAWS();
	}
}

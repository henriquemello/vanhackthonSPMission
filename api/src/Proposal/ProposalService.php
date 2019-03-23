<?php

namespace ProposiDocs\Proposal;

use ProposiDocs\Proposal\Entity\ProposalEntity;
use ProposiDocs\Proposal\Storage\ProposalStorageService;

class ProposalService {

	public static function create(ProposalEntity $entity): ProposalEntity {
		ProposalStorageService::resolve()->insertProposal($entity);
		return $entity;
	}

	public static function getAll(): array {
		return ProposalStorageService::resolve()->getAll();
	}

	public static function getProposal(int $proposalId): ProposalEntity {
		return ProposalStorageService::resolve()->getProposal($proposalId);
	}

	public static function sign(ProposalEntity $entity): ProposalEntity {
		$entity->sign();
		ProposalStorageService::resolve()->updateProposal($entity);
		return $entity;
	}
 
//decline
//delete
//update

}
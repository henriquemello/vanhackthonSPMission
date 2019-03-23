<?php

namespace ProposiDocs\Proposal\Storage\InMemory;

use ProposiDocs\Proposal\Entity\ProposalEntity;
use ProposiDocs\Proposal\Storage\ProposalStorage;

class ProposalStorageInMemory implements ProposalStorage {

	private $storage = [];

	public function insertProposal(ProposalEntity $entity): int {
		if (isset($this->storage[$entity->getId()])) {
			throw new \LogicException('Proposal with id already exists');
		}
		$this->storage[$entity->getId()] = $entity;
		return $entity->getId();
	}

	public function getProposal(int $proposalId): ProposalEntity {
		if (!isset($this->storage[$proposalId])) {
			throw new \LogicException('Proposal with id not found');
		}
		return $this->storage[$proposalId];
	}
}

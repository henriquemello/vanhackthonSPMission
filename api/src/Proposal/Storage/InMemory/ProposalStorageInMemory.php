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

	public function getAll(): array {
		return $this->storage;
	}

	public function getProposal(int $proposalId): ProposalEntity {
		if (!isset($this->storage[$proposalId])) {
			throw new \LogicException('Proposal with id not found');
		}
		return $this->storage[$proposalId];
	}

	public function updateProposal(ProposalEntity $entity): ProposalEntity {
		if (!isset($this->storage[$entity->getId()])) {
			throw new \LogicException('Proposal not found');
		}
		$this->storage[$entity->getId()] = $entity;
		return $this->storage[$entity->getId()];
	}

	public function deleteProposal(ProposalEntity $entity): bool {
		if (!isset($this->storage[$entity->getId()])) {
			throw new \LogicException('Proposal not found');
		}
		unset($this->storage[$entity->getId()]);
		return true;
	}
}

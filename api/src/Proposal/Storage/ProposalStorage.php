<?php

namespace ProposiDocs\Proposal\Storage;

use ProposiDocs\Proposal\Entity\ProposalEntity;

interface ProposalStorage {

	public function insertProposal(ProposalEntity $entity): int;
	public function getProposal(int $proposalId): ProposalEntity;
	public function updateProposal(ProposalEntity $entity): ProposalEntity;
	public function getAll(): array;
	public function deleteProposal(ProposalEntity $entity): bool;

}

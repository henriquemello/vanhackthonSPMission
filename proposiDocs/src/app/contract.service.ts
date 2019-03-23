import { Injectable } from '@angular/core';
import { Contract } from './contract';
import { AngularFireDatabase } from '@angular/fire/database';
import { map } from 'rxjs/operators';


@Injectable({
  providedIn: 'root'
})
export class ContractService {

  constructor(private db: AngularFireDatabase) { }

  insert(contract: Contract){
	this.db.list('contract').push(contract)
	.then((result: any)=>{
		console.log(result.key);
	})
  }

  update(contract: Contract, key: string){
	this.db.list('contract').update(key,contract)
	.catch((error: any)=>{
		console.log(error);
	})
  }

  getall(){
	return this.db.list('contract')
	.snapshotChanges()
	.pipe(
		map(changes =>{
			return changes.map(c => ({key: c.payload.key, ...c.payload.val()}));
		})
	)
  }

  delete( key: string){
	this.db.object(`contract/${key}`).remove();
  }

  // getProposals(){
  //   return this.http.get(`${this.URL}getProposals.php`);
  // }

  // addProposal(proposal){


  //   console.log(JSON.stringify(proposal))
  //   return this.http.post(`${this.URL}addProposal.php`,JSON.stringify(proposal));
  // }

  // deleteProposal(contractId: number){
  //   return this.http.get(`${this.URL}deleteProposal.php?idUser=${contractId}`);
  // }

  // getProposal(contractId:number){
  //   return this.http.get(`${this.URL}getProposal.php?idUser=${contractId}`);
  // }

  // updateProposal(proposal){
  //   return this.http.post(`${this.URL}updateProposal.php`,JSON.stringify(proposal));
  // }
}

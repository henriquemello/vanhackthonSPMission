import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class ContractService {

  URL = "http://localhost:9000/";

  constructor(private http: HttpClient) { }


  getProposals(){
    return this.http.get(`${this.URL}getProposals.php`);
  }

  addProposal(proposal){

    console.log(JSON.stringify(proposal))
    return this.http.post(`${this.URL}addProposal.php`,JSON.stringify(proposal));
  }

  deleteProposal(contractId: number){
    return this.http.get(`${this.URL}deleteProposal.php?idUser=${contractId}`);
  }

  getProposal(contractId:number){
    return this.http.get(`${this.URL}getProposal.php?idUser=${contractId}`);
  }

  updateProposal(proposal){
    return this.http.post(`${this.URL}updateProposal.php`,JSON.stringify(proposal));
  }
}

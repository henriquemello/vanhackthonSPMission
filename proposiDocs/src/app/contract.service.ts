import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class ContractService {

  URL = "http://api.fernandocunha.click/";

  constructor(private http: HttpClient) { }


  getProposals(){
    return this.http.get(`${this.URL}proposals`);
  }

  addProposal(proposal){

    return this.http.post(`${this.URL}proposal`,JSON.stringify(proposal));
  }

  deleteProposal(contractId: number){
    return this.http.delete(`${this.URL}proposal/${contractId}`);
  }

  getProposal(contractId:number){
    return this.http.get(`${this.URL}proposal/${contractId}`);
  }

  updateProposal(proposal,contractId:number){
    return this.http.put(`${this.URL}proposal/${contractId}`,JSON.stringify(proposal));
  }
}

import { Injectable } from '@angular/core';
import { BehaviorSubject} from 'rxjs';
import { Contract } from './contract';

@Injectable({
  providedIn: 'root'
})
export class ContractDataService {

  private contractSource = new BehaviorSubject({
    contract: null,
    key: ''
  });

  currentContract = this.contractSource.asObservable();

  constructor() { }

  changeContract(contract: Contract, key: string){
    this.contractSource.next({
      contract: contract,
      key: key
    });
  }
}

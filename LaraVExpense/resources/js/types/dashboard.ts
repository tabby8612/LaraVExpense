export type Variant = {
    variant: 'income' | 'expense';
};

export type TransVariant = {
    variant?: 'income' | 'expense';
};

export interface Transaction {
    id: string;
    name: string;
    amount: number;
    date: string;
    category: string;
    account: string;
    reference: string;
    subCategory: string;
    note: string;
    createdBy: string;
}

export interface RecurringTransaction {
    id: string;
    name: string;
    amount: number;
    date: string;
    type: string;
    category: string;
}

export interface Option {
    id: number;
    name: string;
}

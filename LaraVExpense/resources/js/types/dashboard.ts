export type Variant = {
    variant: 'income' | 'expense';
};

export type TransVariant = {
    variant?: 'income' | 'expense';
};

export interface Transaction {
    id: string;
    type: 'income' | 'expense';
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

export interface Goal {
    id: string;
    name: string;
    openingBalance: number;
    target: number;
    date: string;
    isGoalReached: boolean;
}

export interface Account {
    id: string;
    name: string;
    openingBalance: string;
    accountNumber: string;
    description: string;
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

export interface Tag {
    id: number;
    name: string;
    color: string;
    usageCount: number;
}

export interface Budget {
    id: string;
    user: string;
    category: string;
    subCategory: string;
    plannedAmount: number;
    spendAmount: number;
    remainingAmount: number;
    month: string;
    year: string;
    description: string;
}

export interface User {
    id: string;
    name: string;
}

export interface TransMonthly {
    category: string;
    type: 'income' | 'expense';
    jan: string;
    feb: string;
    mar: string;
    apr: string;
    may: string;
    jun: string;
    jul: string;
    aug: string;
    sep: string;
    oct: string;
    nov: string;
    dec: string;
    total: string;
}

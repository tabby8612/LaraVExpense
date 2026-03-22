import type {
    Option,
    RecurringTransaction,
    Transaction,
} from '@/types/dashboard';

export const transactions = {
    incomes: [
        {
            name: 'freelancer',
            date: '2026-02-25',
            account: 'Bank 2',
            amount: '$500',
        },
        {
            name: 'fiverr',
            date: '2026-02-24',
            account: 'Bank 2',
            amount: '$500',
        },
        {
            name: 'Upwork',
            date: '2026-02-18',
            account: 'Bank 1',
            amount: '$300',
        },
        {
            name: 'Job',
            date: '2026-02-10',
            account: 'Bank 2',
            amount: '$200',
        },
    ],
    expenses: [
        {
            name: 'motorcycle fuel',
            date: '2026-02-05',
            account: 'Bank 2',
            amount: '$5',
        },
        {
            name: 'haircut',
            date: '2026-02-24',
            account: 'Bank 2',
            amount: '$10',
        },
        {
            name: 'gym',
            date: '2026-02-10',
            account: 'Bank 2',
            amount: '$10',
        },
        {
            name: 'Chicken Tikka',
            date: '2026-02-10',
            account: 'Bank 2',
            amount: '$3',
        },
    ],
};

export const payments: Transaction[] = [
    {
        id: '728ed52a',
        name: 'salary',
        amount: 23000,
        date: '11/03/2026',
        category: 'HHC Dropshipping',
        account: 'UBL',
        reference: 'ABC123',
        subCategory: 'Internship',
        note: 'salary of month march',
        createdBy: 'Tabish',
    },
    {
        id: '728ed52b',
        name: 'income',
        amount: 24000,
        date: '11/04/2026',
        category: 'HHC Dropshipping',
        account: 'UBL',
        reference: 'ABC123',
        subCategory: 'Internship',
        note: 'salary of month april',
        createdBy: 'Tabish',
    },
    {
        id: '728ed52c',
        name: 'business',
        amount: 25000,
        date: '22/05/2026',
        category: 'HHC Dropshipping',
        account: 'UBL',
        reference: 'ABC123',
        subCategory: 'Internship',
        note: 'salary of month april',
        createdBy: 'Tabish',
    },
    {
        id: '728ed52d',
        name: 'salary',
        amount: 23000,
        date: '22/06/2026',
        category: 'HHC Dropshipping',
        account: 'UBL',
        reference: 'ABC123',
        subCategory: 'Internship',
        note: 'salary of month may',
        createdBy: 'Tabish',
    },
    {
        id: '728ed52e',
        name: 'salary',
        amount: 23000,
        date: '22/07/2026',
        category: 'HHC Dropshipping',
        account: 'UBL',
        reference: 'ABC123',
        subCategory: 'Internship',
        note: 'salary of month june',
        createdBy: 'Tabish',
    },
];

export const RecurringTransactions: RecurringTransaction[] = [
    {
        id: '728ed52g',
        name: 'salary',
        amount: 23000,
        date: '22/07/2026',
        category: 'HHC Dropshipping',
        type: 'Income',
    },
    {
        id: '728ed52h',
        name: 'salary',
        amount: 24000,
        date: '23/07/2026',
        category: 'HHC Dropshipping',
        type: 'Upcoming Income',
    },
    {
        id: '728ed52i',
        name: 'salary',
        amount: 25000,
        date: '24/07/2026',
        category: 'HHC Dropshipping',
        type: 'Expense',
    },
    {
        id: '728ed52j',
        name: 'Profit',
        amount: 26000,
        date: '25/07/2026',
        category: 'HHC Dropshipping',
        type: 'Income',
    },
    {
        id: '728ed52h',
        name: 'salary',
        amount: 29000,
        date: '28/07/2026',
        category: '97 Solution',
        type: 'Upcoming Expense',
    },
];

export const transactionTypes: Option[] = [
    {
        id: 1,
        name: 'Income',
    },
    {
        id: 2,
        name: 'Expense',
    },
    {
        id: 3,
        name: 'Upcoming Income',
    },
    {
        id: 4,
        name: 'Upcoming Expense',
    },
];
export const accounts: Option[] = [
    {
        id: 1,
        name: 'UBL',
    },
    {
        id: 2,
        name: 'Cash',
    },
    {
        id: 3,
        name: 'HBL',
    },
    {
        id: 4,
        name: 'Mashreq',
    },
];

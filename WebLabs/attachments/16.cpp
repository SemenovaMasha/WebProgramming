// ConsoleApplication13.cpp: определяет точку входа для консольного приложения.
//


#include "stdafx.h"
#include <stdio.h>

/* узор числа
void main()
{
int a;//введенное число
int n;//число строки
int k;
scanf("%i", &a);
n = 0;

do {
k = a - n;
do {
printf("%i ", k);
k++;
} while (k <= a);

printf("\n");
n++;
} while (n < a);
}
*/
/* степени двойки
void main() {
int n;//ввод
int i=0;
int k=1;
scanf("%i", &n);
do {
printf("2^%i = %i \n", i, k);
i++;
k *= 2;

} while (i <= n);
}*/
/* Факториал
void main() {
	int n;//ввод
	int i = 0;// сколько выведнео
	int k = 1;
	int f = 1;
	int t = 0;

	scanf("%i", &n);
	do {
		i++;
		k *= i;
	} while (i < n);
	printf("%i", k);
}*/
/*void main() {
	int a;
	int m = 1;//абзац
	int f = 1;
	int k;//number строка в абзаце
	scanf("%i", &a);
	printf("\n\n");
	do {
		k = 1;
		do {
			f = 1;
			do {
				printf("%i ", m);
				f++;
			} while (f <= k);
			k++;
			printf("\n");
		} while (k <= m);
		m++;
		printf("\n");
	} while (m <= a);
}*/
//*
void main() {
	int n;
	int i=0;
	int t=0;// 2 el
	int k=0;// 1 el
	int f=1;
	scanf("%i", &n);
	do {
		printf("%i ", k);
		t = k;
		k = f;
		f = t + k;
		i++;
	} while (i < n);
	printf("\n");
}
//*/
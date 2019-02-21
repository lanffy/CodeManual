%{
int wordCount = 0;
%}
chars [A-Za-z\_\'\.\"]
numbers (0-9)+
delim [" "\n\t]
whitespace {delim}+
words {chars}+
%%
{words} {wordCount++;
}
{whitespace}
{numbers}
%%
int main()
{
yylex();
printf(" No of words:%d\n", wordCount);
}
int yywrap()
{
return 1;
}
